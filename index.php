<html>
<head>
  <meta charset="utf-8">
  <title>Books Grant Custer loved.</title>
  <meta content="A virtual shelf of books I liked a whole lot.">
	<style type="text/css">
		/* http://meyerweb.com/eric/tools/css/reset/ 
		   v2.0 | 20110126
		   License: none (public domain)
		*/
		html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, embed, 
		figure, figcaption, footer, header, hgroup, 
		menu, nav, output, ruby, section, summary,
		time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			font: inherit;
			vertical-align: baseline;
		}
		/* HTML5 display-role reset for older browsers */
		article, aside, details, figcaption, figure, 
		footer, header, hgroup, menu, nav, section {
			display: block;
		}
		body {
			line-height: 1;
			font-family: sans-serif;
		}
		ol, ul {
			list-style: none;
		}
		blockquote, q {
			quotes: none;
		}
		blockquote:before, blockquote:after,
		q:before, q:after {
			content: '';
			content: none;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
		}
		header {
			width: 800px;
			margin: 50px auto 30px;
			overflow: hidden;
			text-align: center;
		}
		.header_text {
			line-height: 1.3em;
		}
		.header_text h1 {
			font-size: 34px;
			font-weight: bold;
			margin-bottom: 1px;
			line-height: 1.3em;		  
		}
		.header_text h1 a {
		  font-size: 34px;
		  background: #eee;
		  font-weight: normal;
		  padding: 6px 4px 0;
		  line-height: 32px;
		  display: inline-block;
		}
    .header_text h1 a:hover {
		  background: #ff0000;
		  color: #fff;
		}
		.sources {
			font-size: 14px;
			font-style: italic;
		}
		.header_text a {
			text-decoration: none;
			font-weight: bold;
			color: #000;
			font-style: normal;
		}
		.header_text a:hover {
			color: #FF0000;
		}
				
		section {
			width: 800px;
			margin: 0 auto 40px;
			clear: both;
		}
		section #booklist {
			overflow: hidden;
		}
		section #booklist li {
			float: left;
			margin: 0 20px;
			font-size: 12px;
		}
		section #booklist li a {
			float: left;
			height: 170px;
			width: 120px;
			position: relative;	
			padding: 0;	
			text-indent: -9999px;	
		}
		section #booklist li.no_cover a {
			background: #111;
			color: #fff;
			text-decoration: none;
			line-height: 1.35em;
			box-shadow: 0 2px 3px #000;
			text-indent: 0;
			height: 140px;
			width: 90px;
			padding: 15px;		
		}
		section #booklist li a.hover {
			background: #111;
			color: #fff;
			text-decoration: none;
			line-height: 1.35em;
			box-shadow: 0 2px 3px #000;
			text-indent: 0;
			height: 140px;
			width: 90px;
			padding: 15px;
		}
		strong {
			font-weight: bold;
		}
		em {
			font-style: italic;
		}
		.shelf {
			height: 10px;
			border-radius: 6px;
			background: #ddd;
			width: 100%;
			clear: both;
			margin-bottom: 40px;
		}
		section #booklist li img {
			position: absolute;
			bottom: 0;
			display: block;
			box-shadow: 0 2px 3px #333;
		}
		section #booklist li a.hover img {
			display: none;
		}
		section #booklist li.no_cover img {
			display: none;
		}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready( function() {
			$('section #booklist li a').addClass('hover');
			$('section #booklist li a img').one('load', function() {
				var book_width = $(this).width();
				var book_margin = ((120 - book_width)/2);
				$(this).css('margin-left',book_margin);
				$(this).parent().removeClass('hover');
			}).each( function() {
				if(this.complete) {
					$(this).load();
				};
			});
			$('section #booklist li a').hover(
				function() {
					$(this).addClass('hover');
				},
				function() {
					$(this).removeClass('hover');
				}
			);
		});
	</script>
	<?  $url = "http://www.goodreads.com/review/list/74775.xml?key=YOUR_KEY_HERE&sort=rating&order=d&per_page=50";
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$xmlobj = new SimpleXMLElement($response);
		$review = $xmlobj->reviews->review; ?>
</head>
<body>
	<header>
		<div class="header_text">
			<h1>Books <a href="http://blog.grantcuster.com">Grant Custer</a> loved.</h1>
			<p class="sources">based on <a href="http://otletsshelf.tumblr.com/" target="_blank">Otlet's Shelf</a> and powered by <a href="http://www.goodreads.com" target="_blank">Goodreads</a>.</p>
		</div>
	</header>
	<section>
		<ul id="booklist">
			<? $counter = 0 ?>
			<? foreach($review as $r): ?>
				<? if ($r->rating == 5) { ?>
					<? $counter++; ?>
					<? $final_count = $counter; ?>
				<? } ?>
			<? endforeach; ?>
			<? $counter = 0 ?>
			<? foreach($review as $r): ?>
				<? if ($r->rating == 5) { ?>
					<? $counter++; ?>
						<li class="<? if ($counter % 5 == 0) { echo 'fourth';  } ?><? if ( $r->book->image_url == 'http://www.goodreads.com/images/nocover-111x148.jpg') { echo 'no_cover'; } ?>">
							<a href="<?= $r->book->link ?>">
								<strong><?= $r->book->title ?></strong> by <em><?= $r->book->authors->author->name ?></em>
								<? if ( $r->book->image_url == 'http://www.goodreads.com/images/nocover-111x148.jpg') { ?><? } else { ?>
									<img src="<?= $r->book->image_url; ?>" />
								<? }; ?>
							</a>
						</li>
					<? if ($final_count % 5 > 0) { ?>
						<? if ($counter == $final_count) { ?><div class="shelf"></div><? } ?>
					<? } ?>					
					<? if ($counter % 5 == 0) { echo '<div class="shelf"></div>'; } ?>
				<? }; ?>
			<? endforeach; ?>
		</ul>
	</section>
</body>
</html>