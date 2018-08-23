<?php
/**
 * Uploading functionality with Google Cloud Storage
 *
 * Hijacks the uploading functionality in WordPress to use Google Cloud Storage
 * for the NextCellent Gallery.
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */

namespace Google\Cloud\Storage\WordPress\NextCellentUploads;

defined('ABSPATH') or die('No direct access!');

NextCellentUploads::bootstrap();

/**
 * Functionalities for media upload.
 */
class NextCellentUploads
{
    const USE_HTTPS_OPTION = 'gcs_use_https_for_media';
    const BUCKET_OPTION = 'gcs_bucket';

    /**
     * Register our filter.
     */
    public static function bootstrap()
    {
        add_action('ngg_get_image', __CLASS__ . '::filter_upload_dir');
    }

    /**
     * Swap the upload dir with gs:// path in the GCS bucket.
     */
    public static function filter_upload_dir($image)
    {
        $bucket = get_option(self::BUCKET_OPTION, '');
        if ($bucket === '') {
            // Do nothing without the bucket name.
            return $values;
        }
        $basedir = sprintf('gs://%s/%s', $bucket, get_current_blog_id());
        $use_https = get_option(self::USE_HTTPS_OPTION, false);
        $baseurl = sprintf(
            '%s://storage.googleapis.com/%s/%s',
            $use_https ? 'https' : 'http',
            $bucket,
            get_current_blog_id()
        );

        $image->imagePath = $baseurl . '/' . str_replace('wp-content/', '', $image->path) . '/';
        $image->thumbPath = $baseurl . '/' . str_replace('wp-content/', '', $image->path) . '/thumbs/thumbs_';

        $image->imageURL = $image->imagePath . $image->filename;
        $image->thumbURL = $image->thumbPath . $image->filename;

        $image->href = preg_replace('/href="(.*)\/' . $image->filename . '"/m', 'href="' . $image->imageURL . '"', $image->href);
        $image->href = preg_replace('/src="(.*)' . $image->filename . '"/m', 'src="' . $image->thumbURL . '"', $image->href);

        $image->imageHTML = $image->thumbHTML = $image->href;

        return $image;
    }


    /**
     * Unlink files starts with 'gs://'
     *
     * This is needed because WordPress thinks a path starts with 'gs://' is
     * not an absolute path and manipulate it in a wrong way before unlinking
     * intermediate files.
     *
     * TODO: Use `path_is_absolute` filter when a bug below is resolved:
     *       https://core.trac.wordpress.org/ticket/38907#ticket
     */
    public static function filter_delete_file($file)
    {
        $prefix = 'gs://';
        if (substr($file, 0, strlen($prefix)) === $prefix) {
            @ unlink($file);
        }
        return $file;
    }

}
