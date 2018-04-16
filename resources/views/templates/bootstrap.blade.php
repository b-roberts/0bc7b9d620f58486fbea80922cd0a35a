<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<link rel="stylesheet" href="{{url('/css/theme.default.min.css')}}"  />
<link rel="stylesheet" href="{{url('/css/oni.css')}}"  />
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link href="https://fonts.googleapis.com/css?family=Quantico|Lato" rel="stylesheet">
<style>
*{
	font-family: Lato;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
	font-family: 'Quantico';
	text-transform: uppercase;
	letter-spacing: -3px;
	font-weight: bold;
	}
	.navbar-brand {
		font-family: 'Quantico';
		text-transform: uppercase;
		letter-spacing: -1px;
	}


	.aa-input-container {
  display: inline-block;
  position: relative; }
.aa-input-search {
  width: 300px;
  border: 1px solid rgba(228, 228, 228, 0.6);
  padding: 12px 28px 12px 12px;
  box-sizing: border-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none; }
  .aa-input-search::-webkit-search-decoration, .aa-input-search::-webkit-search-cancel-button, .aa-input-search::-webkit-search-results-button, .aa-input-search::-webkit-search-results-decoration {
    display: none; }
.aa-input-icon {
  height: 16px;
  width: 16px;
  position: absolute;
  top: 50%;
  right: 16px;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  fill: #e4e4e4; }
.aa-dropdown-menu {
  background-color: #fff;
  border: 1px solid rgba(228, 228, 228, 0.6);
  min-width: 300px;
  margin-top: 10px;
  box-sizing: border-box; }
.aa-suggestion {
  padding: 12px;
  cursor: pointer;
}
.aa-suggestion + .aa-suggestion {
    border-top: 1px solid rgba(228, 228, 228, 0.6);
}
  .aa-suggestion:hover, .aa-suggestion.aa-cursor {
    background-color: rgba(241, 241, 241, 0.35); }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
	rel="stylesheet"
	integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	crossorigin="anonymous">
  @stack('styles')
</head>
<body>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand">{{env('APP_TITLE')}}</a>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="aa-search-input">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container d-flex justify-content-between">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{route('category.index')}}">Schematics</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="{{route('schematic.create')}}">Publish a Schematic</a>
	      </li>

	    </ul>
			@include('modules.menu.user_menu')
	  </div>
	</div>
</nav>

@yield('content')
@include('modules.abuse_report')

<footer class="bg-dark text-light">

<div class="container mt-4">

<div class="row">
<div class="col-md-4 col">
<h4>Creations</h4>
</div>
<div class="col-md-4 col">
<h4>Legal</h4>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link" href="#">Privacy Policy</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Terms of Service</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://www.algolia.com">
			<img style="max-width:10em;" src="https://www.algolia.com/static_assets/images/press/downloads/search-by-algolia-white.png" alt="Search by algolia"/>
		</a>
  </li>
</ul>

</div>
<div class="col-md-4 col">
<h4>Community</h4>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link" target="_blank" href="https://forums.kleientertainment.com/forum/118-oxygen-not-included/">Official Forums</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" target="_blank" href="https://oxygennotincluded.gamepedia.com/Oxygen_Not_Included_Wiki">Wiki</a>
  </li>
	<li class="nav-item">
		<a class="nav-link" target="_blank" href="http://store.steampowered.com/app/457140/Oxygen_Not_Included/">ONI on Steam</a>
	</li>
</ul>

</div>

</div>

<div class="row">
	<div class="col">
		<small class="text-center">
			<p>&copy;{{date('Y')}} {{env('APP_URL')}} All Rights Reserved. </p>
			<p>Oxygen Not Included is copyright of <a href="https://www.kleientertainment.com/" target="_blank" >Klei Entertainment</a>. ONI Schematics is not affiliated or endorsed by Klei Entertainment in any way.</p>
			<p>Steam is copyright of <a href="https://www.valvesoftware.com/" target="_blank" >Valve Corporation</a>. ONI Schematics is not affiliated or endorsed by Valve Corporation in any way.</p>
			<p>Game content and materials are trademarks and copyrights of their respective publisher and its licensors. All rights reserved.</p>
			<p>User submitted content is owned by the author.</p>
		</small>
	</div>
</div>

</div>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/4.5.5/pixi.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="{{url('/js/jssor.slider.min.js')}}"></script>

<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<!-- Initialize autocomplete menu -->
<script>
var client = algoliasearch("{{env('ALGOLIA_APP_ID')}}", "{{env('ALGOLIA_PUBLIC')}}");
var index = client.initIndex('primary_index');
//initialize autocomplete on search input (ID selector must match)
autocomplete('#aa-search-input',
{ hint: false, debug:true }, {
    source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
    //value to be displayed in input control after user's suggestion selection
    displayKey: 'title',
    //hash of templates used when rendering dataset
    templates: {
        //'suggestion' templating function used to render a single suggestion
        suggestion: function(suggestion) {
          return '<span>' +
            suggestion._highlightResult.title.value + '</span>';
        }
    }
});
</script>
<script>
$(document).ready(function()
    {
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
});
</script>

   @stack('scripts')
</body>
</html>
