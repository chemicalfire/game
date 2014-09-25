<?php 

class SidebarMenu extends CWidget 
{

	public $items = array();
	public $activeClass = 'active';
	public $activateItems = true;
	public $activateParents = true;
	public $firstClass = 'start';
	public $lastClass = 'last';

	public function init() 
	{
		parent::init();
		$route = $this->getController()->getRoute();
		$hasActiveChild = false;
		$this->items = $this->normalizeItems($this->items, $route, $hasActiveChild);
	}


	public function run() 
	{
		return $this->renderMenu($this->items);
	}


	protected function renderMenu($items) 
	{
		// echo '<pre>', print_r($items, true), '</pre>';
		$html = <<<HTML
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing-->
	<!-- DOC: Change data-auto-spped="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu" data-auto-scroll="true" data-slide-speed="200">
HTML;
		echo $html;
		$this->renderMenuRecursive($items);
		$html = <<<HTML
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
HTML;
		echo $html;
	}


	protected function renderMenuRecursive($items) 
	{
		$count = 0;
		$n = count($items);
		foreach ($items as $item) {
			$count ++;
			$class = array();
			if ($item['active']) {
				$class[] = $this->activeClass;
			}
			if ($count === 1) {
				$class[] = $this->firstClass;
			}
			if ($count === $n) {
				$class[] = $this->lastClass;
			}
			$options = array();
			if (!empty($class)) {
				$options['class'] = implode(' ', $class);
			}
			echo CHtml::openTag('li', $options);
			echo $this->renderMenuItem($item);
			if (isset($item['items']) && count($item['items'])) {
				echo CHtml::openTag('ul', array('class' => 'sub-menu'));
				$this->renderMenuRecursive($item['items']);
				echo CHtml::closeTag('ul');
			}
			echo CHtml::closeTag('li');
		}
	}


	protected function renderMenuItem($item) 
	{
		if (isset($item['url'])) {
			$url = CHtml::normalizeUrl($item['url']);
		} else {
			$url = "javascript:;";
		}
		echo '<a href="' . $url . '">';
		if (isset($item['icon']) && !empty($item['icon'])) {
			echo '<i class="icon-' . $item['icon'] . '"></i>';
		}
		echo '<span class="title">' . $item['title'] . '</span>';
		if ($item['active']) {
			echo '<span class="selected"></span>';
		} else {
			echo '<span class="arrow"></span>';
		}
		echo '</a>';
	}


	protected function normalizeItems($items, $route, &$active) 
	{
		foreach ($items as $i => $item) {
			$hasActiveChild = false;
			if (isset($item['items'])) {
				$items[$i]['items'] = $this->normalizeItems($item['items'], $route, $hasActiveChild);
				if (empty($items[$i]['items'])) {
					unset($items[$i]['items']);
				}
				if (empty($item['title'])) {
					unset($items[$i]);
				}
			}
			if (!isset($item['active'])) {
				if ($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item, $route)) {
					$active = $items[$i]['active'] = true;
				} else {
					$items[$i]['active'] = false;
				}
			} elseif ($item['active']) {
				$active = true;
			}
		}
		return array_values($items);
	}


	protected function isItemActive($item, $route) 
	{
		if (isset($item['url']) && is_array($item['url']) && !strcasecmp(trim($item['url'][0], '/'), $route)) {
			unset($item['url']['#']);
			if (count($item['url']) > 1) {
				foreach (array_splice($item['url'], 1) as $name => $value) {
					if (!isset($_GET[$name]) || $_GET[$name] != $value) {
						return false;
					}
				}
			}
			return true;
		}
		return false;
	}

}