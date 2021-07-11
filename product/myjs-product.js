// Insert Record in the Database
$(document).ready(function(){
    Insert_record();
    view_record();
    get_record();
    update_record();
    delete_record();
})

function Insert_record()
{
   $(document).on('click','#btn_add',function()
   {
        var sp_ten = $('#sp_ten').val();
        var sp_donvitinh = $('#sp_donvitinh').val();
        var sp_giahientai = $('#sp_giahientai').val();

        if(sp_ten=="" || sp_donvitinh=="" || sp_giahientai=="")
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax(
                {
                    url : 'insert.php',
                    method: 'post',
                    data:{sp_ten:sp_ten, sp_donvitinh:sp_donvitinh, sp_giahientai:sp_giahientai},
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

//Get Particular Record
function get_record()
{
    $(document).on('click','#btn_edit',function()
    {
        var ID = $(this).attr('data-id');
        $.ajax(
            {
                url: 'get-data.php',
                method: 'post',
                data:{ProductID:ID},
                dataType: 'JSON',
                success: function(data)  
                {
                   $('#UP_MaSP').val(data[0]);
                   $('#UP_TenSP').val(data[1]);
                   $('#UP_DVT').val(data[2]);
                   $('#UP_GHT').val(data[3]);
                   $('#update').modal('show');

                }

            })
    })
}

// Update Record
function update_record()
{

    $(document).on('click','#btn_update',function()
    {
        var update_ma = $('#UP_MaSP').val();
        var update_ten = $('#UP_TenSP').val();
        var update_dvt = $('#UP_DVT').val();
        var update_ght = $('#UP_GHT').val();

        if(update_ten=="" || update_dvt=="" || update_ght=="")
        {
            $('#up-message').html('please Fill in the Blanks');
            $('#update').modal('show');
        }
        else
        {
            $.ajax(
                {
                    url: 'update.php',
                    method: 'post',
                    data:{U_Ma:update_ma, U_Ten:update_ten, U_DVT:update_dvt, U_GHT:update_ght},
                    success: function(data)
                    {
                        $('#up-message').html(data);
                        $('#update').modal('show');
                        view_record();
                    }
                })
        }

    })
}

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