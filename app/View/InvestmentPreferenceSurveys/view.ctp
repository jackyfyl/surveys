<div class="investmentPreferenceSurveys view">
<h2><?php echo __('Investment Preference Survey'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q01'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q01']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q02'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q02']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q03'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q03']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q04'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q04']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q05'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q05']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q06'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q06']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q07'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q07']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q08'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q08']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q09'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q09']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q10'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q10']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q11'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q11']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q12'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q12']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q13'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q13']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q14'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q14']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q15'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q15']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q16'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q16']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q17'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q17']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q18'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q18']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q19'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q19']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q20'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['q20']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Userid'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['userid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wxopenid'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['wxopenid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($investmentPreferenceSurvey['InvestmentPreferenceSurvey']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Investment Preference Survey'), array('action' => 'edit', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Investment Preference Survey'), array('action' => 'delete', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id']), array(), __('Are you sure you want to delete # %s?', $investmentPreferenceSurvey['InvestmentPreferenceSurvey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Investment Preference Surveys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Investment Preference Survey'), array('action' => 'add')); ?> </li>
	</ul>
</div>
