<!DOCTYPE php>
<?php
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Filtering click() if .attr ----  </title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script type="text/javascript" src="//code.jquery.com/jquery-1.7.1.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>


<link rel="stylesheet" type="text/css" href="/css/result-light.css">


  <style id="compiled-css" type="text/css">
      .categorya, .categoryb {
    display:none;
    width: 30px;
    height: 20px;
    line-height:20px;
    text-align:center;
    background: red;
    margin: 10px;
    float: left;
    font-size:11px;
    color:white;
    font-family:sans-serif;
}

.categoryb {
    background: blue;
}

.categorya.categoryb{
    background:purple;
}
p.info{
    padding:30px 20px 0 20px;
    color:#666;
    font-family:sans-serif;
    font-size:13px;
}
    /* EOS */
  </style>

  <script id="insert"></script>


</head>
<body>
    <ul id="filters">
    <li>
        <input type="checkbox" value="categorya" id="filter-categorya" />
        <label for="filter-categorya">Category A</label>
    </li>
    <li>
        <input type="checkbox" value="categoryb" id="filter-categoryb" />
        <label for="filter-categoryb">Category B</label>
    </li>
</ul>

<div class="categorya categoryb">A, B</div>
<div class="categorya">A</div>
<div class="categorya">A</div>
<div class="categorya">A</div>
<div class="categoryb">B</div>
<div class="categoryb">B</div>
<div class="categoryb">B</div>


<script type="text/javascript">
$("#filters :checkbox").click(function() {
       $("div").hide();
       $("#filters :checkbox:checked").each(function() {
           $("." + $(this).val()).show();
       });
    });
  </script>

  <script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "mvcbfu73"
      }], "*")
    }
    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
  </script>


</body>
</html>
