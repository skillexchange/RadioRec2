<?php $title = 'Radiko' ?>
<?php $path = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/' ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<rss version="2.0">
  <channel>
    <title><?php echo $title ?></title>
    <description><?php echo $title ?> Podcast</description>
    <link><?php echo $path ?></link>
    <language>ja</language>
<?php foreach (glob('*.m4a') as $file): ?>
<?php preg_match('/(\w+)_(\d{4})-(\d{2})-(\d{2})-(\d{2})_(\d{2})/', $file, $matches) ?>
    <item>
      <title><?php echo $matches[1], '_', $matches[2], '.', $matches[3], '.', $matches[4] ?></title>
      <description><?php echo $matches[0] ?></description>
      <pubDate><?php echo date('r',mktime($matches[5], $matches[6], 0, $matches[3], $matches[4], $matches[2])) ?></pubDate>
      <enclosure url="<?php echo $path ?><?php echo $file ?>" length="<?php echo filesize($file) ?>" type="<?php echo mime_content_type($file) ?>" />
    </item>
<?php endforeach ?>
  </channel>
</rss>
