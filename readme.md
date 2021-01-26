# VideoLength Grabber

- Plugin Name:       VideoLength Grabber
- Description:       A ClassicPress plugin that grabs a video duration and inject it into a meta field in the post editor.
- Plugin URI:        https://forums.classicpress.net/u/Horlaes
- Contributors:      Devsrealm
- Author:            Devsrealm
- Author URI:        https://github.com/devsrealm/
- Donate link:       https://devsrealm.com
- Tags:              videolength, quote field
- Version:           1.0
- Stable tag:        1.0
- Requires at least: 3.5
- Tested up to:      4.9
- Text Domain:       videolength
- Domain Path:       /languages
- License:           GPL v2 or later
- License URI:       https://www.gnu.org/licenses/gpl-2.0.txt

## Installation
1. Go to your Dashboard
2. Hover over the *Plugin* section at the left hand side and select *Add New*
3. Click *Upload Plugin*
4. Choose Quick Summary Zip File and Select Install
5. When you are done uploading, Activate Plugin and Follow The Next Step Below

### Requirements
Requires at least Classicpress V1

### Description

A ClassicPress plugin that grabs a video duration and inject it into a meta field in the post editor

### Usage
Goto any template part you would like to display the value of duration, be it a content, below your post title, under featured image, etc;)

and add this

```
  <div class="video-duration">
          <?php
          $video_duration   = get_post_meta( $post->ID, 'videolength_duration', true );
          if ( is_singular( get_post_type() ) && '' !== $video_duration) {
             ?> <span> <?php echo esc_html( $video_duration ); ?> </span> <?php
            } 
          else {
            echo '';}
          ?>
   </div>
```

