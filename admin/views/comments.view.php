<?php require 'sidebar.php'; ?>  

<script type="text/javascript">
  $(document).ready(function(){
    $('#table_id').dataTable({
     "bProcessing": true,
     "sAjaxSource": "../controller/get_comments.php",
     "responsive": true,
     "bPaginate":true,
     "sPaginationType":"full_numbers",
     "iDisplayLength": 10,
     "aoColumns": [
    { mData: 'rid'},
    { mData: 'body'},
    { mData: 'rtype', "width": "10%", "className": "text-capitalize"},
    { "mData": null ,
    "width": "15%",
    "className": "text-center",
    "mRender" : function (data) {
      return "<a href='../controller/edit_user.php?id="+data.user_id+"' class='btn-link' target='_blank'>"+data.user_name+"</a>";}
    },
    { mData: 'created', "width": "20%"},
    { "mData": null ,
    "width": "14%",
    "className": "text-center",
    'orderable': false,
    'searchable': false,
    "mRender" : function (data) {

      if (data.rtype == 'comment') {
      return "<a class='btn btn-small btn-danger btn-delete deleteItem' data-url='../controller/delete_comment.php?id="+data.rid+"'>"+DELETEITEM+"</a>";
      }else{
      return "<a class='btn btn-small btn-danger btn-delete deleteItem' data-url='../controller/delete_reply.php?id="+data.rid+"'>"+DELETEITEM+"</a>";}
      }

    }
    ]
  });
  });
</script>

<!--Page Container-->
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">

        <div class="section-title">
          <h5 class="text-truncate"><?php echo _COMMENTS; ?></h5>
        </div>

        <div class="row">

          <div class="col-12 c-col-12"></div>

          <div class="col-12">
            <div class="block table-block mb-4 c-4">

              <div class="row">
                <div class="table-responsive">
                  <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
                    <thead>
                      <tr>
                        <th><?php echo _TABLEFIELDID; ?></th>
                        <th><?php echo _TABLEFIELDCONTENT; ?></th>
                        <th><?php echo _TABLEFIELDTYPE; ?></th>
                        <th><?php echo _TABLEFIELDNAME; ?></th>
                        <th><?php echo _TABLEFIELDCREATED; ?></th>
                        <th><?php echo _TABLEFIELDACTIONS; ?></th>
                      </tr>
                    </thead>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>