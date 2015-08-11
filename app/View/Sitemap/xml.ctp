<? echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?
	foreach($aNavBar as $item) {
		$url = Router::url($item['href'], true);
		if (isset($item['href']['action']) && $item['href']['action'] == 'index') {
			$url.= '/';
		}
?>
<url>
  <loc><?=$url?></loc>
  <changefreq>daily</changefreq>
</url>
<?
	}
	foreach($aCategories as $id => $title) {
		$url = Router::url(array('controller' => 'Products', 'action' => 'index', 'Product.cat_id' => $id), true);
?>
<url>
  <loc><?=$url?></loc>
  <changefreq>daily</changefreq>
</url>
<?
	}
	foreach($aArticles as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'noresize');
?>
<url>
  <loc><?=$url?></loc>
  <changefreq>daily</changefreq>
</url>
<?
	}
?>
</urlset>
