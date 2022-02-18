<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-table.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content-header"><h1> Manage Product</h1>
<section class="content">
<div class="row">
    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title"></h3> -->
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="sl"  >SL.</th>
                            <th data-field="Name" data-sortable="true" >Title </th>
                            <th data-field="desc" data-sortable="true"> Short Desc</th>
                            <th data-field="Reviews" data-sortable="true">Views </th>
                            <th data-field="Report" data-sortable="true">Reports </th>
                            <th data-field="Fetured" data-sortable="true">Fetured </th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $AddList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="text-center"></td>
                          <td><?php echo e(++$k); ?></td>
                            <td class="">
                              <a href="<?php echo e(url('/preview-list/'.$data->id.'/'.$data->slug)); ?>"><b> <?php echo e(str_limit($data->title,20)); ?></b></a>
                            </td>
                           <td class="">
                              <?php echo e(str_limit($data->short_desc,40)); ?>

                           </td>
                            <td class="text-center"><b><?php echo e($data->reviews); ?> </b></td>
                            

                            <td class="text-center">
                            <a href="<?php echo e(url('/preview-report/'.$data->id.'/'.$data->slug)); ?>" class="btn btn-xs btn-info">
                            <b><?php echo e($data->reports()->count()); ?> </b></a></td>
                            <td class="text-center">
                              <?php if($data->is_featured == 1): ?> 
                              <span class="label label-success">Enable</span>
                              <?php else: ?>
                              <span class="label label-warning">Disable</span>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                            <?php if($data->status == 1) {?>
                              <span class="label label-success">Active</span>
                              <?php } elseif($data->status == 2){ ?>
                              <span class="label label-danger">Expired</span>
                              <?php } else{ ?>
                              <span class="label label-warning">Pending</span>
                              <?php }?>
                            </td>
                            <td class="">

                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs">Options</button>
                              <button type="button" class="btn btn-default  btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <?php if($data->status == 0): ?> 
                                <li><a href="<?php echo e(url('/active-list/'.$data->id)); ?>">Active</a></li>
                                <li><a href="<?php echo e(url('/expired-list/'.$data->id)); ?>">Expired</a></li>
                                <?php elseif($data->status == 1): ?>
                                <li><a href="<?php echo e(url('/pending-list/'.$data->id)); ?>">Pending</a></li>
                                <li><a href="<?php echo e(url('/expired-list/'.$data->id)); ?>">Expired</a></li>
                                <?php elseif($data->status == 2): ?>
                                <li><a href="<?php echo e(url('/active-list/'.$data->id)); ?>">Active</a></li>
                                <li><a href="<?php echo e(url('/pending-list/'.$data->id)); ?>">Pending</a></li>
                                <?php endif; ?>

                              <?php if($data->is_featured == 0): ?> 
                              <li><a href="<?php echo e(url('/allow-fetured-list/'.$data->id)); ?>">Allow Fetured</a></li>
                              <?php else: ?>
                              <li><a href="<?php echo e(url('/disallow-fetured-list/'.$data->id)); ?>">Disallow Fetured</a></li>
                              <?php endif; ?>
                              </ul>
                            </div>

                            <a class="btn btn-primary btn-xs" href="<?php echo e(url('/preview-list/'.$data->id.'/'.$data->slug)); ?>">
                                <span class="fa fa-eye"></span>  View
                            </a>
                                
                                <a class="btn btn-danger btn-xs" href="<?php echo e(url('/delete-list/'.$data->id.'/'.$data->slug)); ?>" onclick="return checkDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>  Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-table.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>