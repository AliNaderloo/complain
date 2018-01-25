
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('css/JqueryMobile.css') }} ">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.css" integrity="sha256-e8D8laFfmKxErx7NbvjaJYUEpv9LN8qgeXQj0DvLd+g=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.css" integrity="sha256-e8D8laFfmKxErx7NbvjaJYUEpv9LN8qgeXQj0DvLd+g=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal-default-theme.min.css" integrity="sha256-iJlvlQFv31232zI/zrsL/jbuubLWWr/Bv99d+XfaC7Y=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />

</head>
<body style="direction: ltr;margin:20px;">
  <table id="DataTable" style="font-size: 14px" class="table direction table-hover dataTable" role="grid" >
    <thead>
      <tr  role="row" >
        <th>شماره</th>
        @foreach ($Table->head as $head)
        <th>{{$head}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @php $i=0 @endphp
      @foreach ($Table->data as $complaints)
      <tr role="row" >
        <th style="text-align: center;">@php echo ++$i @endphp</th>
        <th class="consignment">{{$complaints->fld_Consignment}}</th>
        <th>{{$complaints->fld_Complaints_Subjects}}</th>
        <th><p style="width: 210px;word-break: break-all;">{{$complaints->fld_Description}}</p></th>
        <th style="min-width: 60px">
        @if($complaints->fld_Registrar==1)
        نماینده
        @else
        مشتری
        @endif
        </th>
        <th>{{$complaints->fld_User_Name}}</th>
        <th><span style="display: none;">{{$complaints->created_at}}</span>
        <p style="min-width: 115px">{{jDate::forge($complaints->created_at)->format('%y/%m/%d %H:%M')}}</p>
        </th>
        <th>

        @if ($complaints->fld_Level==1) ثبت شده است @endif 
        @if ($complaints->fld_Level==2) در حال انجام @endif 
        @if ($complaints->fld_Level==3)  به اتمام رسیده @endif 

        </th>
        <th>
        <button  value="{{$complaints->fld_Id}}" style="background-color: tomato;color: white" type="button" class="btn btn-default btn-sm deleteComplainBtn">
        <span class="glyphicon glyphicon-trash"></span> حذف
        </button>
        </th>
        </tr> 
        @endforeach
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>   
        </div>
        <br>
        </div>
        <div class="remodal" data-remodal-id="createModal" style="max-width: 100%;width: 95%;direction:ltr;">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h4 style="margin: 0 auto;margin-bottom: 15px;text-align:center;color:#2196F3">ثبت شکایت جدید<span id="selConsignment" style="color:#3c8dbc;font-weight: bold;"></span></h4>
        <iframe id="historyContainer" src="" style="height : 460px;width: 100%;display:none;"></iframe>
        <form id="newComplaintForm" action="/newComplaint" method="get" style="text-align:right;">
        <input id="spcForm" id="Spc" name="Spc" value="Spc" style="display:none;">
        <div class="form-group">
        {{ csrf_field() }}
        <img style="height:40px;width:40px;display:none;" id="laoderImage" src="/img/Spinner.gif"/>
        <button class="btn btn-default btn-sm " id="newTrack" style="background-color: #239D60;font-size: 13px;height: 32px;margin-top: 7px;color: white;margin-bottom:5px">
        <span style="vertical-align: -2px;" class="glyphicon glyphicon-search"></span> پیگیری
        </button>
        <label for="Consignment" class="formHeader">:  شماره بارنامه </label>
        <input autocomplete="off"  style="direction:ltr"  type="text" class="form-control" name="Consignment" id="Consignment" @if($createSpcCom!=false) value="{{$createSpcCom}}"  @endif  readonly placeholder="بارنامه">
        </div>
        <div class="form-group">
        <div class="radioHolder"> 
        <label  class="containerRadio">نماینده
        <input type="radio" value="1" name="Registrar" >
        <span class="checkmark"></span>
        </label>
        </div>
        <div class="radioHolder">
        <label  class="containerRadio">مشتری
        <input type="radio" value="2" name="Registrar" >
        <span class="checkmark"></span>
        </label>
        </div>
        <label class="formHeader" for="Consignment">: پیگیری از طرف</label>
        </div>
        <div class="form-group">
        <label class="formHeader"  id="Complaints" >: موضوع</label>
        <select class="form-control" name="Complaints" id="Complaints">
        @foreach ($Subjects as $Complaint)
        <option value="{{$Complaint->fld_Id}}">{{$Complaint->fld_Complaints_Subjects}}</option>
        @endforeach
        </select>
        </div>
        <div class="form-group">
        <label class="formHeader"  for="Description" >: توضیح</label>
        <textarea style="resize: vertical;" type="text" class="form-control" name="Description" id="Description"  rows="10" cols="50"></textarea>
        </div>
        <button type="submit" id="submitNewComplaint" class="btn btn-primary">ثبت</button>
        </form>
        <br>
        </div>
        </form>
        <br>
        </div>  
        <button class="btn btn-default btn-sm newComplaint" style="background-color: #239D60;font-size: 13px;height: 32px;margin-top: 5px;color: white;" type="button">
        <span style="vertical-align: -2px;" class="glyphicon glyphicon-plus"></span> شکایت جدید
        </button>   
        </body>
        <footer>
        <div id="conId" style="display:none;">@if($createSpcCom!=false){{$createSpcCom}}@endif</div>

        <!-- jQuery 2.2.0 -->
        <script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.js" integrity="sha256-tR7fz2fCeycqI9/V8mL9nyTc4lI14kg2Qm6zZHuupxE=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trunk8/1.3.3/trunk8.min.js" integrity="sha256-r2/aTIHrpMiedh+4T1JPMLkQ6VcVDZ8XkRE/7i5piLs=" crossorigin="anonymous"></script>
        <script >
        $( document ).ready(function() {
          $('p').trunk8({
            fill: '&hellip; <a id="read-more" href="#">بیشتر</a>'
          });
          $(document).on('click', '#read-more', function (event) {
            $(this).parent().trunk8('revert').append(' <a id="read-less"  href="#">کمتر</a>');

            return false;
          });

          $(document).on('click', '#read-less', function (event) {
            $(this).parent().trunk8();

            return false;
          });
          var $globBtn;
          String.prototype.toEnDigit = function() {
            return this.replace(/[\u06F0-\u06F9]+/g, function(digit) {
              var ret = '';
              for (var i = 0, len = digit.length; i < len; i++) {
                ret += String.fromCharCode(digit.charCodeAt(i) - 1728);
              }
              return ret;
            });
          };
          @if($createSpcCom!=false) 
          var instt = $('[data-remodal-id=createModal]').remodal();
          $('[data-remodal-id=createModal]').val($('#conId').text().trim());
          $('[data-remodal-id=createModal]').find('#Consignment').attr('readonly',true)
          @endif 
          $(document).on('click', '.newComplaint', function(e) {
            var inst = $('[data-remodal-id=createModal]').remodal();
            $('[data-remodal-id=createModal]').find('#Consignment').val($('#conId').text().trim());
            $('[data-remodal-id=createModal]').val($('#conId').text().trim());
            $('[data-remodal-id=createModal]').find('#Consignment').attr('readonly',true);
            $('[data-remodal-id=createModal]').find('#Spc').val('Spc');
            inst.open();
            $('#historyContainer').hide();
          });
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
          $('#newComplaintForm').on('submit', function(e){ 
           $('#Consignment').val($('#Consignment').val().toEnDigit());               
           e.preventDefault();
           if ($('#Consignment').val().length < 17) {
            toastr.error('! شماره بارنامه کمتر از ۱۷ رقم است ');
            return 0;
          }
          if (!$.trim($("#Description").val())) {
            toastr.error('! توضیحات را وارد کنید');
            return 0;
          }

          if ($("input[name='Registrar']:checked").val()==undefined) {
            toastr.error('! نماینده یا مشتری را مشخص نمایید ');
            return 0;
          }
          if ($('#Consignment').val().substr(0,7)!=5410000 || $('#Consignment').val().substr(14,3)!=101 ){
            toastr.error('فرمت بارنامه درست نیست',$('#Consignment').val());
            return 0;
          }

          //CheckExsist
          var CheckConExsist=true;
          var d1= $.ajax({
            method: "GET",
            dataType:'json',
            url: "http://portal.parschapar.local/api/tracking-api.php",
            data: {
              consignment_no: $('[data-remodal-id=createModal]').find('#Consignment').val()
            },
            success: function(data){
              if (data.result==0) {
                toastr.error('! بارنامه ای با این شماره ثبت نشده است', {timeOut: 7000});
                CheckConExsist=false;
                return 0;
              }
            }
          });
         //CheckExsist
          $.when( d1 ).done(function () {
            if (CheckConExsist) {
              $.ajax({
                type: 'GET',
                url: '/newComplaint',
                data: $('#newComplaintForm').serialize(),
                success: function(data) {
                  $('#DataTable_wrapper').remove();
                  $('body').prepend(data);
                  MainDataTable=  $('#DataTable').DataTable({
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
                  var inst = $('[data-remodal-id=createModal]').remodal();
                  inst.close();
                  $('[data-remodal-id=createModal] input[type="text"]').val('');
                  $('[data-remodal-id=createModal] textarea').val('');
                  $('[data-remodal-id=createModal] input[type="radio"]').prop('checked', false);
                  toastr.success('شکایت با موفقیت ثبت شد', {timeOut: 7000});
                  $('p').trunk8({
                    fill: '&hellip; <a id="read-more" href="#">بیشتر</a>'
                  });
                }
              });
            }
          });
        });
          $('#newTrack').on('click', function(e){
           e.preventDefault();
           $('#laoderImage').show();
           var consignment_no= $('[data-remodal-id=createModal]').find('#Consignment').val();
           $("#historyContainer").attr("src", "http://portal.parschapar.local/following.php?tracking="+consignment_no);
           $('#historyContainer').load(function(){
             $('#historyContainer').show();
             $('#laoderImage').hide();
           });
         });
        });

</script>
</footer>
</html>

