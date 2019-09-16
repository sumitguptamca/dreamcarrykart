"use strict";
jQuery(document).ready(function () {
	var baseurl = window.location.protocol+'//'+window.location.host;

	 jQuery('.additem').click(function () {
        jQuery('#s_id').val(jQuery(this).attr('lang'));
        jQuery('#mediumModal').modal('show');
    });
    jQuery('.viewdetails').click(function () {
        //jQuery("#p_id").html(jQuery(this).attr('lang'));
        jQuery('#mediumModal').modal('show');
       
    });
    jQuery('.viewdetails').click(function () {
        jQuery("#mediumModal").modal('show');
        jQuery("#history").val(jQuery(this).attr('lang'));
        jQuery.ajax({
            type: "POST",
            url: baseurl + "/teddy_new/admin/patient/view",
            data: "history=" + jQuery(this).attr('lang'),
            datatype: "html",
            beforeSend: function () {
            },
            success: function (response) {
                jQuery('#view_patient_details').html(response);
                console.log(response);
            }
        });
    });
     
    jQuery("#job_search").keyup(function(){

    var search = jQuery(this).val();
    if(search != ""){
       $.ajax({
       type: "post",
       url:baseurl+'/teddy_new/caregiver/search',
       data: {'search' : search},
       dataType: "json",
       success: function(data){
                jQuery("#searchjobres").empty();
                var len = data.length;
                for( var i = 0; i<len; i++){

                 var id  = data[i]['serviceid'];
                 var name = data[i]['name'];
                 jQuery("#searchjobres").append("<li value='"+id+"'>"+name+"</li>");

                   // // binding click event to li
                    jQuery("#searchjobres li").bind("click",function(){
                     setText(this);
                    });
                }
            }
        });
    }
    });

});
function setText(element){
    var value = $(element).text();
   // var id = $(element).val();
    jQuery("#job_search").val(value);
    jQuery("#searchjobres").empty();

}

function changestatus(sid,id){
	//alert(id);
	 var baseurl = window.location.protocol+'//'+window.location.host;
	 jQuery.ajax({
            type: "POST",
            url: baseurl + "/teddy_new/admin/changeserviceStatus",
            data: "status=" + sid +"&id="+id,
            datatype: "html",
            beforeSend: function () {
            },
            success: function (response) {
                window.location.reload(true);
            }
        });
}
function changesServiceStatus(sid,id){

	var baseurl = window.location.protocol+'//'+window.location.host;
	 jQuery.ajax({
            type: "POST",
            url: baseurl + "/teddy_new/admin/changeserStatus",
            data: "status=" + sid +"&id="+id,
            datatype: "html",
            beforeSend: function () {

            },
            success: function (response) {
                window.location.reload(true);
            }
        });

}
function changescaregiverstatus(sid,id){

    var baseurl = window.location.protocol+'//'+window.location.host;
     jQuery.ajax({
            type: "POST",
            url: baseurl + "/teddy_new/admin/caregivers/status",
            data: "status=" + sid +"&id="+id,
            datatype: "html",
            beforeSend: function () {

            },
            success: function (response) {
                window.location.reload(true);
            }
        });

}
function changespatientstatus(sid,id){
    var baseurl = window.location.protocol+'//'+window.location.host;
     jQuery.ajax({
            type: "POST",
            url: baseurl + "/teddy_new/admin/patient/status",
            data: "status=" + sid +"&id="+id,
            datatype: "html",
            beforeSend: function () {

            },
            success: function (response) {
                window.location.reload(true);
            }
        });
}
function rejectJob(id){
     var conf = confirm("Are you sure want to reject this job?");
    if(conf == true)
    {
    var baseurl = window.location.protocol+'//'+window.location.host;
    jQuery.ajax({
        type:"POST",
        url: baseurl + "/teddy_new/admins/job_admin/rejectJobByAdmin",
        data:"id="+id,
       success:function(data){
         window.location.reload(true);
          console.log(data);
         // console.log(id);
           //alert(id);
        }
      });
    }
}
