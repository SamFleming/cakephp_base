<?php
if (!isset($modulus)) {
	$modulus = 11;
}
if (!isset($model)) {
	$models = ClassRegistry::keys();
	$model = Inflector::camelize(current($models));
}
?>
<div class="pagination pull-right">
	<ul>
		<?php echo $this->Paginator->prev('&laquo;', array(
			'tag' => 'li',
			'class' => 'prev',
			'escape' => false
		), $this->Paginator->link('&laquo;', array(), array('escape' => false)), array(
			'tag' => 'li',
			'escape' => false,
			'class' => 'prev disabled',
		)); ?>
		<?php
		$page = $this->params['paging'][$model]['page'];
		$pageCount = $this->params['paging'][$model]['pageCount'];
		if ($modulus > $pageCount) {
			$modulus = $pageCount;
		}
		$start = $page - intval($modulus / 2);
		if ($start < 1) {
			$start = 1;
		}
		$end = $start + $modulus;
		if ($end > $pageCount) {
			$end = $pageCount + 1;
			$start = $end - $modulus;
		}
		for ($i = $start; $i < $end; $i++) {
			$url = array('page' => $i);
			$class = null;
			if ($i == $page) {
				$url = array();
				$class = 'active';
			}
			echo $this->Html->tag('li', $this->Paginator->link($i, $url), array(
				'class' => $class,
			));
		}
		?>
		<?php echo $this->Paginator->next('&raquo;', array(
			'tag' => 'li',
			'class' => 'next',
			'escape' => false
		), $this->Paginator->link('&raquo;', array(), array('escape' => false)), array(
			'tag' => 'li',
			'escape' => false,
			'class' => 'next disabled',
		)); ?>
	</ul>
</div>