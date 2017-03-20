<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
$cakeDescription = __d('cake_dev', '業務支援サイト');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		/** jQueryの読込 */
		echo $this->Html->script('jquery-1.7.2.min');
		
		/** Twitter Bootstrapの読込 */
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('bootstrap-dropdown');
		
		/** CSSの読込 */
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
		$(window).load(function() {
			$('.dropdown-toggle').dropdown();
		});
	</script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php 
					echo $this->Html->link(
						$cakeDescription,
						array('controller' => 'customers',
						'action' => 'index'),
						array('class' => 'brand')
					);
				?>
				<div class="nav-collapse">
					<ul class="nav">

						<li class="dropdown" id="menu0">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#menu0">
								業務支援
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('メールテンプレート'), array('controller' => 'templates', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('案件マスタ'), array('controller' => 'softwares', 'action' => 'index')); ?></li>
							</ul>
						</li>			
						<li class="dropdown" id="menu1">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
								システム管理
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('システム変更履歴'), array('controller' => 'changes', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('ソフトウェア一覧'), array('controller' => 'softwares', 'action' => 'index')); ?></li>
							</ul>
						</li>
						<li class="dropdown" id="menu5">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#menu5">
								IPアドレス管理
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('IPアドレス'), array('controller' => 'ipaddresses', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('　機器種別'), array('controller' => 'deviceCategories', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('　IP種別'), array('controller' => 'ipDivCategories', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('　IP割当状態'), array('controller' => 'ipStatusCategories', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('　IP監視機器'), array('controller' => 'monitorDeviceCategories', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('　IP応答性'), array('controller' => 'icmpDivCategories', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('セグメント'), array('controller' => 'segments', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('ロケーション'), array('controller' => 'locations', 'action' => 'index')); ?></li>
							</ul>
						</li>
						<li class="dropdown" id="menu0">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#menu0">
								マスタ情報
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('業務区分マスタ'), array('controller' => 'taskCategories', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('案件マスタ'), array('controller' => 'softwares', 'action' => 'index')); ?></li>
							</ul>
						</li>

						<li class="dropdown" id="menu2">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
								アカウントサービス
								<?php
//									if($auth->loggedIn()) {
//										echo h('('. $auth->user('user_full_name') .'さん)');
//									}else{
//		
//									}
						  		?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('ユーザー情報更新'), array('controller' => 'users', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?></li>
							</ul>
						</li>
		


					</ul>

				</div>
			</div>
		</div>
	</div>
	<div id="container" class="container">
		<div id="content">
			<div id="message">
				<?php echo $this->Session->flash(); ?>
			</div>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer"></div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
