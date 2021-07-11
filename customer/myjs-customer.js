// Insert Record in the Database
$(document).ready(function(){
    Insert_record();
    view_record();
    // get_record();
    // update_record();
    delete_record();
})

function Insert_record()
{
   $(document).on('click','#btn_add',function()
   {
        var kh_ten = $('#kh_ten').val();
        var kh_gt = $('#kh_gioitinh').val();
        var kh_ns = $('#kh_ngaysinh').val();

        if(kh_ten=="" || kh_gioitinh=="" || kh_ngaysinh=="")
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax(
                {
                    url : 'insert.php',
                    method: 'post',
                    data:{KH_TEN:kh_ten, KH_GT:kh_gt, KH_NS:kh_ns},
                    success: function(data)
                    {
                        $('#message').html(data);
                        $('#insert').modal('show');
                        $('form').trigger('reset');
                        view_record();
                    }
                })
        }

   })

   $(document).on('click','#btn_close',function()
   {
       $('form').trigger('reset');
       $('#message').html('');
   })
}

// Display Record
function view_record()
{
    $.ajax(
        {
            url: 'view.php',
            method: 'post',
            dataType:'JSON',
            success: function(data)
            {
                if(data.status=='success')
                {
                    $('#table').html(data.html);
                }
            },
        })
}

// //Get Particular Record
// function get_record()
// {
//     $(document).on('click','#btn_edit',function()
//     {
//         var ID = $(this).attr('data-id');
//         $.ajax(
//             {
//                 url: 'get-data.php',
//                 method: 'post',
//                 data:{CustomerID:ID},
//                 dataType: 'JSON',
//                 success: function(data)  
//                 {
//                    $('#UP_MaKH').val(data[0]);
//                    $('#UP_TenKH').val(data[1]);
//                    $('#UP_GT').val(data[2]);
//                    $('#UP_NS').val(data[3]);
//                    $('#update').modal('show');

//                 }

//             })
//     })
// }

// Update Record
// function update_record()
// {

//     $(document).on('click','#btn_update',function()
//     {
//         var update_ma = $('#UP_MaKH').val();
//         var update_ten = $('#UP_TenKH').val();
//         var update_gt = $('#UP_GT').val();
//         var update_ns = $('#UP_NS').val();

//         if(update_ten=="" || update_gt=="" || update_ns=="")
//         {
//             $('#up-message').html('please Fill in the Blanks');
//             $('#update').modal('show');
//         }
//         else
//         {
//             $.ajax(
//                 {
//                     url: 'update.php',
//                     method: 'post',
//                     data:{U_Ma:update_ma, U_Ten:update_ten, U_GT:update_gt, U_NS:update_ns},
//                     success: function(data)
//                     {
//                         $('#up-message').html(data);
//                         $('#update').modal('show');
//                         view_record();
//                     }
//                 })
//         }

//     })
// }

// Delete Function
function delete_record()
{
    $(document).on('click','#btn_delete',function()
    {
        var Delete_ID = $(this).attr('data-id1');
        $('#delete').modal('show');

        $(document).on('click','#btn_delete_record',function()
        {
            $.ajax(
                {
                    url: 'delete.php',
                    method: 'post',
                    data:{Del_ID:Delete_ID},
                    success: function(data)
                    {
                        $('#delete-message').html(data).hide(5000);
                        view_record();
                    }
                })
        })
    })

    $(document).on('click','#btn_close',function()
    {
        $('form').trigger('reset');
        $('#message').html('');
    })
}