

<?php
  if(isset($_POST['recover']) && $_POST['recover'] != ""){
    echo "reading data: ".$_POST['recover'];
    $recoveredData = file_get_contents('archive/'.$_POST['recover']);
    $recoveredArray = unserialize($recoveredData);
    $_POST = $recoveredArray;

  }elseif(isset($_POST['client']) && $_POST['client'] != ""){
    echo "setting data: ". $_POST['client'].'-'.$_POST['project'].'.txt';
    $serializedData = serialize($_POST);
    file_put_contents('archive/'.$_POST['client'].'-'.$_POST['project'].'.txt', $serializedData);
  }

?>

<?php
  date_default_timezone_set('America/Vancouver');

  $items = array(
    array(
      'label' => 'Browsers tested in Mac OSX',
      'name' => 'mac_browsers',
      'items' => array(
        'Chrome',
        'Safari',
        'Firefox'
      )
    ),
      array(
        'label' => 'Browsers tested in Windows 10',
        'name' => 'windows_browsers',
        'items' => array(
          'Edge',
          'IE 11',
          'IE 10 (simulation)',
          'Chrome',
          'Firefox'
        )
      ),
      array(
        'label' => 'Mobile Devices Tested',
        'name' => 'mobile_browsers',
        'items' => array(
          'Safari on iPhone',
          'Safari on iPad',
          'Android Browser',
          'Chrome on Android'
        )
      ),
      array(
        'label' => 'Screen Sizes Tested',
        'name' => 'screen_sizes',
        'items' => array(
          '<strong>4096x2304:</strong> iMac Retina 4K display',
          '<strong>1920x1080:</strong> Laptop Wide',
          '<strong>1366x768:</strong> Laptop Medium',
          '<strong>1024x768:</strong> Laptop Small',
          '<strong>1024x1366:</strong> iPad Pro Portrait',
          '<strong>1366x1024:</strong> iPad Pro Landscape',
          '<strong>768x1024:</strong> iPad Portrait',
          '<strong>1024x768:</strong> iPad Landscape',
          '<strong>375x667:</strong> iPhone 6',
          '<strong>320x568:</strong> iPhone 5'
        )
      ),
      array(
        'label' => 'General Parts',
        'name' => 'general_parts',
        'items' => array(
          'Favicon in place',
          //'<a href="https://codex.wordpress.org/Meta_Tags_in_WordPress" target="_blank">Proper titles and meta tags in place</a>',
          'Images are optimized',
          'Images are being output with alt tags',
          'If site has search box, <a href="https://codex.wordpress.org/Creating_a_Search_Page" target="_blank">templates</a> for search results and no results.',
          'Custom 404 page',
          //'<a href="https://www.smashingmagazine.com/2009/04/15-essential-checks-before-launching-your-website/#sitemap" target="_blank">XML Sitemap</a>',
          'Link to privacy policy if data is being collected',
          'Test contact forms',
          'Test search functionality',
          '@media print stylesheet',
          '<a href="https://www.smashingmagazine.com/2009/04/15-essential-checks-before-launching-your-website/#rss-link" target="_blank">RSS link for blog sites</a>',
          'Check for broken links <a href="http://validator.w3.org/checklink" target="_blank">W3C Link Checker</a>',
          'Test page speed <a href="https://developers.google.com/speed/pagespeed/" target="_blank">Google Page Speed Test</a>',
          '<a href="http://tools.seobook.com/robots-txt/" target="_blank">Robots.txt</a>',
          '<a href="https://developers.facebook.com/docs/sharing/webmasters" target="_blank">Facebook Open Graph Markup for sharing preview</a>',
        )
      ),
      array(
        'label' => 'Plugins',
        'name' => 'plugins',
        'items' => array(
          'iThemes Security',
          'Yoast SEO',
          'UpdraftPlus'
        )
      ),
      array(
        'label' => 'Right Before Launch',
        'name' => 'before_launch',
        'items' => array(
          'Swap out site emails and contact form emails for client\'s email',
          'Add analytics tracking code',
          'Check that hosting plan has php version of at least 5.6, preferably 7.7',
          'Uncheck "Discourage Search Engines"',
        )
      )
    );
?>

<!DOCTYPE html>
<html>
<head>
  <title>WP Website QA Checklist</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
  <style type="text/css">

    .bg-untested { background: #f12707 !important; color: #000; }
    .bg-fail     { background: #ff7d0d !important; color: #000;}
    .bg-revision  { background: #e0de1b !important; color: #000; }
/*    .bg-notice   { background: #5790ec !important; }*/
    .bg-pass     { background: #2fde34 !important; }
    .bg-na       { background: #dadada !important; color: black !important;}

    .text-critical { color: #f12707 !important; }
    .text-fail     { color: #cc6207 !important; }
    .text-warning  { color: #8c8b1e !important; }
    .text-notice   { color: #5790ec !important; }
    .text-pass     { color: #16af1a !important; }


    .callout { border: 0; margin: 0;}
    .print-only { display: none; }

    body * { -webkit-print-color-adjust: exact; }

    @media print {
      @page       { size: landscape; }
      body        { font-size: 12px; }
      input       { display: none !important; }
      .print-only { display: inline-block !important; }
    }

  </style>
</head>
<body>
  <form method="POST">
    <br />
    <div class="row">
      <div class="column small-6">
        <img src="https://storage.googleapis.com/mri-assets/MRI-logo-2015.svg" width="250">
      </div>
      <div class="column small-6 text-right">
        <h4>Wordpress Website QA Checklist</h4>
      </div>
    </div>

    <hr />

    <div class="row">
      <div class="callout secondary">

        <div class="row">
          <div class="columns small-4">
            <label>Client</label>
            <input type="text" name="client" placeholder="Client" value="<?php echo ( empty($_POST['client']) ? '' : $_POST['client'] ); ?>"></input>
            <?php echo ( empty($_POST['client']) ? '' : '<h4 class="print-only">'.$_POST['client'].'</h4>' ); ?>
          </div>
          <div class="columns small-4">
            <label>Project</label>
            <input type="text" name="project" placeholder="Project" value="<?php echo ( empty($_POST['project']) ? '' : $_POST['project'] ); ?>"></input>
            <?php echo ( empty($_POST['project']) ? '' : '<h4 class="print-only">'.$_POST['project'].'</h4>' ); ?>
          </div>
          <div class="columns small-4">
            <label>Date</label>
            <h4><?php echo Date('F j, Y'); ?></h4>
          </div>
        </div>

        <table>
          <tbody>
            <tr>
              <th class="bg-untested">Not Tested</th>
              <td>Untested.</td>
            </tr>
            <tr>
              <th class="bg-revision">Needs Revisions</th>
              <td>See comments for revision notes.</td>
            </tr>
            <tr>
              <th class="bg-pass">Passed</th>
              <td>Tested and passed.</td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php $files = scandir('archive'); ?>

      <div class="row"><h5 class="columns small-12">RECOVER DATA</h5></div>

      <select name="recover">

        <option value=""></option>

        <?php foreach($files as $file) : ?>
          <?php if($file == '.') continue; ?>
          <?php if($file == '..') continue; ?>
          <?php if($file == '.gitignore') continue; ?>
          <option value="<?= $file ?>"><?= $file ?></option>
        <?php endforeach; ?>

      </select>
    </div>

    <br />

    <?php foreach($items as $scope_count => $scope) : ?>
      <div class="row">

        <div class="row"><h5 class="columns small-12"><?php echo $scope['label']; ?></h5></div>

        <div class="row">
          <div class="columns small-2"><small>Status</small></div>
          <div class="columns small-5"><small>Description</small></div>
          <div class="columns small-5"><small>Comments</small></div>
        </div>

        <?php foreach($scope['items'] as $item_count => $item) : $index = "index-{$scope_count}-{$item_count}"; ?>
          <div class="row">
            <div class="columns small-2">
              <?php if(empty($_POST[$index]['status'])) : ?>
                <select name="<?php echo $index; ?>[status]">
                  <option value=""></option>
                  <option value="untested">Untested</option>
                  <option value="revision">Needs Revision</option>
                  <option value="pass">Pass</option>
                  <option value="na">N/A</option>
                </select>
              <?php else : ?>
                <div class="button expanded bg-<?php echo $_POST[$index]['status']; ?>">
                  <strong><?php echo strtoupper($_POST[$index]['status']); ?></strong>
                </div>
                <input type="hidden" name="<?php echo $index; ?>[status]" value="<?php echo $_POST[$index]['status']; ?>"></input>

              <?php endif; ?>
            </div>

            <div class="columns small-5"><?php echo $item; ?></div>

            <div class="columns small-5">
              <?php if(empty($_POST[$index]['comments'])) : ?>
                <textarea name="<?php echo $index; ?>[comments]"></textarea>
              <?php else : ?>
                <?php echo $_POST[$index]['comments']; ?>
                <input type="hidden" name="<?php echo $index; ?>[comments]" value="<?php echo htmlspecialchars($_POST[$index]['comments']); ?>"></input>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
        <hr />
      </div>
    <?php endforeach; ?>

    <div class="row">
      <br />
      <input type="submit" class="button large columns small-12" value="Generate Report"></input>
    </div>
  </form>

</body>
</html>


