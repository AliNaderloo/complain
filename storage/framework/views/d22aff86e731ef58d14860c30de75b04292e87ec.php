
    <!DOCTYPE html>
    <html>
   <head>
    <link rel="stylesheet" href="<?php echo e(asset('css/JqueryMobile.css')); ?> ">

     <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/Style.css')); ?>">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.css" integrity="sha256-e8D8laFfmKxErx7NbvjaJYUEpv9LN8qgeXQj0DvLd+g=" crossorigin="anonymous" />
   </head>
    <body style="direction: rtl;margin:20px;">
        <table id="DataTable" style="font-size: 14px" class="table direction table-hover dataTable" role="grid" >
        <thead>
          <tr  role="row" >
            <th>شماره</th>
            <?php $__currentLoopData = $Table->head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th><?php echo e($head); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
        </thead>
        <tbody>
          <?php $i=0 ?>
          <?php $__currentLoopData = $Table->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaints): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr role="row" >
            <th style="text-align: center;"><?php echo ++$i ?></th>
            <th class="consignment"><?php echo e($complaints->fld_Consignment); ?></th>
            <th><?php echo e($complaints->fld_Complaints_Subjects); ?></th>
            <th><p style="width: 210px;word-break: break-all;"><?php echo e($complaints->fld_Description); ?></p></th>
            <th style="min-width: 60px">
            <?php if($complaints->fld_Registrar==1): ?>
            نماینده
            <?php else: ?>
            مشتری
            <?php endif; ?>
            </th>
            <th><?php echo e($complaints->fld_User_Name); ?></th>
            <th><span style="display: none;"><?php echo e($complaints->created_at); ?></span>
            <p style="min-width: 115px"><?php echo e(jDate::forge($complaints->created_at)->format('%y/%m/%d %H:%M')); ?></p>
            </th>
            <th>
            
             <?php if($complaints->fld_Level==1): ?> ثبت شده است <?php endif; ?> 
             <?php if($complaints->fld_Level==2): ?> در حال انجام <?php endif; ?> 
             <?php if($complaints->fld_Level==3): ?>  به اتمام رسیده <?php endif; ?> 
          
            </th>
          
            </tr> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>

            </div>
            </div>
            </div>
            </div>   
            </div>
            <br>
            </div>
          
    </body>
    <footer>

 <!-- jQuery 2.2.0 -->
 <script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script >
$( document ).ready(function() {

  var  MainDataTable=  $('#DataTable').DataTable({
                 aaSorting: [[6, 'desc']],
                 "language": {
                  "sEmptyTable":     "هیچ داده ای در جدول وجود ندارد",
                  "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                  "sInfoEmpty":      "نمایش 0 تا 0 از 0 رکورد",
                  "sInfoFiltered":   "(فیلتر شده از _MAX_ رکورد)",
                  "sInfoPostFix":    "",
                  "sInfoThousands":  ",",
                  "sLengthMenu":     "نمایش _MENU_ رکورد",
                  "sLoadingRecords": "در حال بارگزاری...",
                  "sProcessing":     "در حال پردازش...",
                  "sSearch":         "جستجو:",
                  "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
                  "oPaginate": {
                    "sFirst":    "ابتدا",
                    "sLast":     "انتها",
                    "sNext":     "بعدی",
                    "sPrevious": "قبلی"
                  },
                  "oAria": {
                    "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                    "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                  }
                },
              });
  });

</script>
    </footer>
    </html>
   