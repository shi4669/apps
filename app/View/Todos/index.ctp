<div class="todos index">
        <h2><?php echo __('Todo');?></h2>

<?php

header('Expires:');
header('Cache-Control:');
header('Pragma:');

?>
        <div>
                <?php
                        /** 検索 */
                        //echo $this->Form->create('Change', array('action' => 'index', 'default' => false, 'class' => 'form-horizontal'));
                        echo $this->Form->create('Todo', array('class' => 'form-horizontal'));
                ?>
                <table>
                        <tr>
                                <td valign="top" style="padding-right:20px">
                                        <?php
                                                echo $this->Form->input('todo_title', array('label'=>'Todoタイトル'));

                                                echo $this->Form->input(
                                                        'task_category_id',
                                                        array('label'=>'業務区分',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$task_category_id)
                                                        );
                                                echo $this->Form->input(
                                                        'todo_category_id',
                                                        array('label'=>'Todo区分',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$todo_category_id)
                                                        );
                                                echo $this->Form->input('prj_name', array('label'=>'案件名'));

                                        ?>
                                </td>

                                <td valign="top">

                                        <?php
                                                echo $this->Form->input('tag', array('label'=>'タグ'));
                                                echo $this->Form->input(
                                                        'todo_progress_id',
                                                        array('label'=>'Todo進捗',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$todo_progress_id)
                                                        );
                                                echo $this->Form->input(
                                                        'created_id',
                                                        array('label'=>'投稿者',
                                                                'type'=>'select',
                                                                'empty'=>'- 選択してください -',
                                                                'options'=>$created_id)
                                                        );
                                                echo $this->Form->label(
                                                        'todo_date',
                                                        'todo期限'
                                                );
                                                echo $this->Form->input(
                                                        'todo_date_start',
                                                        array(
                                                                'label' => false,
                                                                'type' => 'date',
                                                                'dateFormat' => 'YMD',
                                                                'minYear' => 2000,
                                                                'maxYear' => date('Y'),
                                                                'monthNames' => false,
                                                                'separator' => '/',
                                                                'empty' => '-',
                                                                'class' => 'input-mini ',
                                                                'div' => false,
                                                        )
                                                );
                                                echo ' ～ ';
                                                echo $this->Form->input(
                                                        'todo_date_end',
                                                        array(
                                                                'label' => false,
                                                                'type' => 'date',
                                                                'dateFormat' => 'YMD',
                                                                'minYear' => 2000,
                                                                'maxYear' => date('Y'),
                                                                'monthNames' => false,
                                                                'separator' => '/',
                                                                'empty' => '-',
                                                                'class' => 'input-mini',
                                                                'div' => false
                                                        )
                                                );

                                        ?>
                                </td>

                        </tr>
                </table>
                <?php
                        echo $this->Form->button('検索', array('name' => 'search', 'type' => 'submit', 'class' => 'btn  btn-primary btn-small'));
                        echo '&nbsp;';
                        echo $this->Form->button('クリア', array('name' => 'clear', 'type' => 'submit', 'class' => 'btn  btn-primary btn-small'));
                        echo $this->Form->end();
                ?>
        </div>

        <div class="pull-right">
                <?php
                        echo $this->Html->link(
                                __('新規登録'),
                                array(
                                        'action' => 'add'
                                ),
                                array('class' => 'btn btn-primary btn-small')
                        );
                ?>

        </div>
        <br>
        <br>

        <table  style="table-layout: fixed;">
        <tr>
                        <th width=200><?php echo $this->Paginator->sort('Todoタイトル');?></th>
                        <th><?php echo $this->Paginator->sort('Todo区分');?></th>
                        <th><?php echo $this->Paginator->sort('案件名');?></th>
                        <th><?php echo $this->Paginator->sort('タグ');?></th>
                        <th><?php echo $this->Paginator->sort('Todo期限');?></th>
                        <th><?php echo $this->Paginator->sort('期限まで');?></th>
                        <th><?php echo $this->Paginator->sort('Todo進捗');?></th>
                        <th><?php echo $this->Paginator->sort('投稿者');?></th>
                        <th class="actions"></th>
        </tr>
        <?php
        foreach ($todos as $todo): ?>
        <tr>
                <td><font color=blue><?php echo h($todo['Todo']['todo_title']); ?>&nbsp;</font></td>
                <td><?php echo h($todo['TodoCategory']['todo_category_name']); ?>&nbsp;</td>
                <td><font color=red><?php echo h($todo['Todo']['prj_name']); ?>&nbsp;</font></td>
                <td><font color=green><?php echo h($todo['Todo']['tag']); ?>&nbsp;</font></td>
                <td><?php echo date("Y年n月j日" , strtotime($todo['Todo']['todo_date'])) ?>&nbsp;</td>
                <td>
                        <?php
                                $todo_up_date = date ('Y-m-d', strtotime($todo['Todo']['todo_date']));
                                $today = date ( 'Y-m-d', strtotime( "now" ));

                                $from = new DateTime($todo_up_date);
                                $to = new DateTime($today);

                                $dif_days = $from->diff($to);

                                $dif_days_string = $dif_days->format('%a');

//                              $dif = $todo_up_date - $today;
//                              $dif_time = date("H:i:s", $dif);
                                // 日付単位の差
//                              $dif_days = (strtotime(date("Y-m-d", $dif)) - strtotime("1970-01-01")) / 86400;


                                if ( $todo['TodoProgress']['progress_name'] == '完了' ) {
                                                echo ( '<font color=blue>');
                                                echo h('-');
                                                echo ( '</font>');

                                } else {

                                        if ( $from < $to ) {
                                                echo ( '<font color=red>');
                                                echo h($dif_days_string .'日遅れ');
                                                echo ( '</font>');

                                        } else {

                                                if ( $from == $to ) {
                                                        echo ( '<font color=red>');
                                                        echo h('本日期限');
                                                        echo ( '</font>');
                                                } else {
                                                        //                                              $dif_days = $dif_days - 1;
                                                        echo h($dif_days_string .'日');
                                                }
                                        }

                                }





                        ?>&nbsp;
                </td>
                <td>
                        <?php
                                if ( $todo['TodoProgress']['progress_name'] == '完了' ) {
                                                echo ( '<font color=blue>');
                                                echo h($todo['TodoProgress']['progress_name']);
                                                echo ( '</font>');
                                } else {
                                                echo ( '<font color=red>');
                                                echo h($todo['TodoProgress']['progress_name']);
                                                echo ( '</font>');
                                }
                        ?>&nbsp;
                </td>




                <td><?php echo h($todo['User']['user_full_name']); ?>&nbsp;</td>
                <td class="actions">
<?php echo $this->Html->link(__('参照'), array('action' => 'view', $todo['Todo']['id']),array('class' => 'btn btn-primary btn-small')); ?>
<?php echo $this->Html->link(__('更新'), array('action' => 'edit', $todo['Todo']['id']),array('class' => 'btn btn-primary btn-small')); ?>
                        <?php  echo $this->Form->postLink(__('削除'), array('action' => 'delete', $todo['Todo']['id']),array('class' => 'btn btn-primary btn-small'), __('削除してもよろいですか # %s?', $todo['Todo']['id'])); ?>


                                                         </td>
        </tr>
<?php endforeach; ?>
        </table>
        <p>
                <?php
                        echo $this->Paginator->counter(array(
                        'format' => __('{:count} 件中 {:page} ページ目 ({:start} ～ {:end} 件表示)')
                        ));
                ?>
        </p>

        <div class="paging">
        <?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
        </div>
</div>
<div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
                <li><?php echo $this->Html->link(__('New Todo'), array('action' => 'add')); ?></li>
        </ul>
</div>
