<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ratchet template page</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="{{ asset('ratchet-v2.0.2/css/ratchet.css')}}" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="{{ asset('ratchet-v2.0.2/js/ratchet.js') }}"></script>
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Ratchet</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
      <p class="content-padded">Thanks for downloading Ratchet. This is an example HTML page that's linked up to compiled Ratchet CSS and JS, has the proper meta tags and the HTML structure. Need some more help before you start filling this with your own content? Check out some Ratchet resources:</p>
      <p></p>
            <a href="http://localhost/dynamic/admin/showpollingform" data-ignore="push">Google<a>
      <div class="card">
        <ul class="table-view">
          <li class="table-view-cell">
            <a class="push-right" href="http://goratchet.com">
              <strong>Ratchet documentation</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="push-right" href="https://github.com/twbs/ratchet/" >
              <strong>Ratchet on Github</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="push-right" href="https://groups.google.com/forum/#!forum/goratchet">
              <strong>Ratchet Google group</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="push-right" href="https://twitter.com/goratchet">
              <strong>Ratchet on Twitter</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="navigate-right" href="http://localhost/dynamic/admin/showpollingform"  >
              <strong>Polling Form</strong>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </body>
</html>