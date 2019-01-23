<style>
/* =======================================================================================
  User Manual Stylesheet
  Dashicons: https://developer.wordpress.org/resource/dashicons/
======================================================================================= */
#user-manual {
  padding: 44px;
}

h1 {
  padding-bottom: 4px;
  border-bottom: 2px solid #999;
}

hr {
  margin: 20px 0;
  border-color: #999;
}

/* =======================================================================================
		Simple Accordion
======================================================================================= */
dl#simA {
  margin: 0 auto;
  width: auto;
  width: 100%;
  height: auto;
}

#simA dt {
	display: -webkit-box;
	display: -webkit-flex;
	display: flex;
  -webkit-flex-direction: row;
  flex-direction: row;
  margin: 0 0 4px;
  padding: 10px;
  cursor: pointer;
  font-size: 1.2rem;
  color: #fff;
  background: rgba(0,106,156,1); 
}

#simA dt .accIcon {
  width: 5%;
  color: #fff;
  text-align: center;
  font-family: "dashicons";
  display: inline-block;
  font-size: 22px;
  font-weight: 400;
  font-style: normal;
  vertical-align: top;
  margin-right: 5px;
  margin-right: 0.5rem;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

#one:before {
  content: "\f464";
}

#two:before {
  content: "\f128";
}

#three:before {
  content: "\f204";
}

#four:before {
  content: "\f547";
}

#five:before {
  content: "\f135";
}

#six:before {
  content: "\f301";
}

#seven:before {
  content: "\f227";
}

#simA dt .accHdr {
	width: 95%;
}

#simA dd {
	display: none;
	max-width: 95%;
	margin: 0 auto 12px;
  padding: 10px;
  color: #333;
  background: transparent;
}

#simA dd p {
	margin: 0 0 12px;
	font-size: 0.9rem;
	line-height: 1.2em;
}

pre {
  padding: 10px;
  background: #444;
  color: #fff;
}

div.logo {
  text-align: center;
}

</style>

<script>
var $ = jQuery;
var ACCORDION = function () {

/**
*  @private accordion
*  @description: 
*  @params: aId {string} ID of the <dl> element
*						spd {number} Speed in microseconds of the transition
*
*/
var accordion = function(aId,spd) {

  var elID = "#" + aId;
  $(elID + " dt").on( "click", function() {
   $(this).next('dd').slideToggle(spd).siblings('dd').slideUp(spd);
  });
  
}; // accordion()


/**
*  @public init()
*  @description
*/
this.init = function () {

    accordion('simA', 300);

}; // init()
  

}; // ACCORDION()

var initaccordion = new ACCORDION(); 

$(document).ready(function(){

initaccordion.init(); 

});
</script>

<!-- ================================================ BEGIN PAGE CONTENT ================================================= -->
<div id="user-manual">

<h1>Bookworm Theme User Manual</h1>

<p>
Below are instructions on how to use the custom features included in this theme. These customization features are not 
required upon the intitial launch of the theme/site. The instructions below require some comfort level using simple 
aspects of the browser's developer tools. The instructions should be detailed enough to get the changes made without 
prior experience doing so.
</p>
<p>
Where applicable, these customizations are being built into a plugin specifically for this theme (or into the theme's code directly) as time 
permits and this theme will be updated.
</p>

<hr />

<dl id="simA">
	<dt><span class="accIcon" id="one"></span><span class="accHdr">Easily Override CSS Styling</span></dt>
  <dd style="display: none;">
  <p>
  If you wish to change any of the default CSS styles, you can easily do so using the "Additional CSS" feature found on the Customization 
  tab under <a href="../wp-admin/customize.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">Appearance > Customize</a>.
  </p>
  <p>
  For example, if you wanted to replace i.e. override the wood plank background on the page:
</p>
<ol>
  <li>
Add the background image to the Media Library. After it is uploaded, copy the images URL.
  </li>
<li>Right click on the background in the browser and select "Inspect". The right hand column of the window that comes up should 
  show you the applied CSS class declaration. Using that selector class copy out and change the desired values. In this case, the 
  background of the #content element.
</li>
<li>
Add a new declaration in the "Additional CSS" editor. For example:
  </li>
  <li>
<pre>
#content {
  background-image: url(http://localhost:8888/bookworm/wp-content/uploads/2019/01/bg_scratch-dk.png);
}
  </pre>
  </li>
  <li>
Click the Publish button, then reload the browser window with the site loaded.
</li>
  </ol>

<p>
Note: The structure of Bookworm is not necessarily intuitive. For example, you might think that the background image above can 
be changed/overridden using the "Custom Background" feature. Not so with this theme. More of this is explained below.
</p>

</dd>

	<dt><span class="accIcon" id="two"></span><span class="accHdr">Overriding the Body Background</span></dt>
  <dd style="display: none;">
<p>
The custom background (<a href="../wp-admin/customize.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">Appearance > Customize</a> > Background Image) 
is the image that will show in the section where the top of the content area overlays. 
Setting this will override the preset background image, but not a feature image added to a page or post.
</p><p>
The featured image of a page or post, if set, will override the background image set above or the default 
background image. This is a page by page customization.
</p><p>
If you change the background image using the featured image and it is a repeating tile, you might need to add the following 
CSS snippet following the instructions above for doing so. If it is a full screen photo or image, the following should not 
be necessary.
</p>
<pre>
.page-id-NUM #top-banner {
    background-color: transparent; /* if you are using a transparent tile, add the color here */
    background-position: 50% 50%; /* If you want it positioned differently */
    background-repeat: repeat;
    background-size: auto;
}
</pre>
<p>
Note the added caveat here. Since the featured image is a per page/post feature, you need the page or post's ID to apply these 
changes only to that page/post. Right click anywhere and select "Inspect". You should see the HTML in the window that opens. The 
&lt;body> tag is near the top. In the "class" attribute you will see a classname with the pattern "page-id-NUMBER". Copy that 
and replace the placeholder in the snippet above.
</p>

  </dd>

	<dt><span class="accIcon" id="three"></span><span class="accHdr">Table of Contents (CustomPageTOC) Template</span></dt>
<dd style="display: none;">
<p>
Bookworm was built with story writers in mind.
</p>
<p>
If you wish to use Post pages as chapters and have a custom "Posts Page" where the table of contents i.e. the Post pages listed 
in ascending order by publish date, create a new page and use the "CustomPageTOC" template instead of the default page template. 
This is found in the "Template" drop down in the right column.
</p><p>
Hint: any content you add in the text editor for this page will not show up in the browser page. You can use this to write "notes 
to self" or instructions for this page etc.
</p><p>
The thinking here is that each chapter is written in a linear sense - post page output is by default listed in descending date 
order i.e. the latest post/chapter at the top of the list. This template prints out the chapters (posts) in ascending order.
</p><p>
If you write a chapter out of order, you can "move" it up or down the order by changing the publish date. Go to All Posts, then 
under YourPost > Quick Edit simply change the date and/or time to be between the dates of the chapters/posts that you want to 
appear before and after the chapter/post being moved. 
</p>
<p>
If you use this template as a TOC and you still wish to have a "Posts Page", you can still set any page as your (default) Post Page 
under <a href="../wp-admin/customize.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">
Homepage Settings on Appearance > Customize</a>.
</p>
</dd>

<dt><span class="accIcon" id="four"></span><span class="accHdr">Custom Title Page (CustomTitlePage) Template</span></dt>
<dd style="display: none;">
<p>
For a unique Title page, use the CustomTitlePage template. The featured img is the frontispiece img, the title given to the 
site is used and any other content is from the 
<a href="../wp-admin/widgets.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">
Title Page Widget (titlepg-content)</a>. (the featured image here is coded differently 
from the default pages and posts).
</p><p>
You can then set this page as your homepage under <a href="../wp-admin/customize.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">
Homepage Settings on Appearance > Customize</a>.
</p><p>
Hint: any content you add in the text editor for this page will not show up in the browser page. You can use this to write 
"notes to self" or instructions for this page etc.
</p>
</dd>

<dt><span class="accIcon" id="five"></span><span class="accHdr">Custom Sidebars</span></dt>
<dd style="display: none;">
<p>
Bookworm utilizes several custom sidebars to add flexibility to how you architect your site's content.
</p>
<p>
All sidebars can be found on the <a href="../wp-admin/widgets.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">
Widgets</a> page.
</p>
<p>
Page sidebars on Bookworm are positioned below the content area.
</p><p>
The default sidebar for all pages and posts on the site is the "Page Sidebar".
</p><p>
You can set up a sidebar for all Post pages using the Post Sidebar, which will override the Page Sidebar (sidebar-page).
</p><p>
You can set up a unique sidebar for the Table of Contents page if you are using the CustomPageTOC template by "activating" (adding content to) the TOC Sidebar (sidebar-toc).
</p><p>
You can set up a unique sidebar for the Title page if you are using the CustomTitlePage template by "activating" (adding content to) the Title Page Sidebar (sidebar-titlepg).
</p><p>
"sidebar-search" is shared by both the archive pages and search results page, which defaults as above to the sidebar-page widget.
</p><p>
The footer is structured to have 3 columns, so 3 widgets: footer1, footer2 and footer3. These will show up globally on every page's footer.
</p><p>
There is also a widget for your own copyright information.
</p>
</dd>

<dt><span class="accIcon" id="six"></span><span class="accHdr">Social Menu</span></dt>
<dd style="display: none;">
<p>
Icons and links for social websites and email are included in a custom menu.
</p>

<ol>
<li>Go to <a href="../wp-admin/nav-menus.php?return=%2Fbookworm%2Fwp-admin%2Fadmin.php%3Fpage%3Duser_manual">Appearance > Menus</a>.
</li><li>Select the Social Links Menu and add menu items using the "Custom Links" tool in the left column.
</li><li>In the Screen Options Tab at the top of the Admin page, click it and select "CSS Classes" under Advanced Properties.
</li><li>When you add the link and label for each menu item, add the appropriate class from the list below. These are the supported social icons that come with Bookworm:

  <pre>
icon-yelp 
icon-twitter 
icon-facebook 
icon-linkedin 
icon-email 
icon-youtube 
icon-github
icon-gplus 
icon-amazon  
icon-pinterest 
icon-instagram
</pre></li>
</ol>
</dd>


<dt><span class="accIcon" id="seven"></span><span class="accHdr">FontAwesome Icons </span></dt>
<dd style="display: none;">
<p>
Bookworm provides the FontAwesome Free set of icons for use on the site.
</p>
<p>
You can find the gallery of the icons available in the free set 
<a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">on the FontAwesome site</a>.
</p>
<p>
Click on an icon and copy the HTML snippet at the top of the page and paste into either a "Custom HTML" widget or in the 
"Text" tab in your page/post's content.
</p>
</dd>


<!--
<dt><span class="accIcon" id="EDIT-ID"></span><span class="accHdr">SECTION HEADER</span></dt>
<dd style="display: none;">
<p>

</p>
</dd>
-->
</dl>


<div class="logo">
<img src="<?php bloginfo('template_url'); ?>/assets/images/logo_bookworm.png" />
</div>


</div> <!-- #user-manual -->