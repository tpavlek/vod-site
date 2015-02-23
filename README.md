SC2CTL VOD Site
================

This is the [sculpin](https://sculpin.io) source for the [SC2CTL VOD site](http://vods.sc2ctl.com).

Adding Youtube Playlists
-------------------------

It can be cumbersome to manually create all the files for a large number of YouTube playlists. This package ships with 
a url helper: `url.php` to help with creating those files.

First run `composer install` to grab dependencies. Then, change the casters and tournament at the top of the `url.php`
file. On the command line run

```
php url.php "first-video-in-playlist-url" "Title" "Comma,Separated,Teams" date
```

for example:

```
php url.php "https://www.youtube.com/watch?v=MnqHaoUAcVQ&list=PLAWvVvFNESfuSh5t0WM5cHzve2YNHVtVk&index=1" "Showmatch: Intense vs. Bioice" "Psistorm,Team Ascension" 2014-12-04
```


Publishing
-----------

```
./publish.sh
```
