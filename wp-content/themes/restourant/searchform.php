<?php
/**
 * Шаблон формы поиска (searchform.php)
 * @package WordPress
 * @subpackage turgenev
 */
?>
<form id="test" role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
<button type="submit" class="btn btn-sm search">Искать</button>
	<div class="form-group">
		<label class="sr-only" for="search-field">Поиск</label>
		<input type="search" class="form-control input-sm text-form" id="search-field" placeholder="Поиск" value="<?php echo get_search_query() ?>" name="s">
	</div>
	
</form>