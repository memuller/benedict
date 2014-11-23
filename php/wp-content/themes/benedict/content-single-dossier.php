<?php
/**
 * The Template for standard post format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<?php global $spacing; $dossier = new Benedict\Dossier();
	$pedia = new Benedict\Pedia($dossier->pedia);
	$contact = new Benedict\Pedia($dossier->contact);  
?>
<div class="col span_9" style="margin-top: <?php echo $spacing ?>px;">
	<article>
		<?php the_title('<h1 class="post-title">', '</h1>'); ?>
		<?php the_content(); ?>
		<h2>A jornada até agora</h2>
		<ul>
			<?php foreach ($dossier->evidences() as $evidence): 
				$tool = $evidence->tool(); ?>
				<li>
					<span class="status <?php if($evidence->status == 0) echo "underway" ?>">
						<?php echo $evidence->status() ?>
						<?php if($evidence->status == 1): ?>
							<date> 
							<?php echo $evidence->done_at ?>
							</date>
						<?php endif; ?>			
					</span>
					<a class="tool" href="<?php echo $tool->permalink ?>"><?php echo strtolower($tool->title); ?></a>
					<br/>
					<h4><a href="<?php echo $evidence->URL ?>">
						<?php echo $evidence->title ?>
					</a></h4>
					
					
				</li>
			<?php endforeach ?>
		</ul>
	</article>
</div>
<aside class="col span_3" style="margin-top: <?php echo $spacing ?>px;">
	<?php require 'widgets/dossier.php' ?>
</aside>