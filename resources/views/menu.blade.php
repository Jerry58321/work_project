<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include("validator")
<form method="post">
    {{csrf_field()}}
    <div class="container" style="margin-top:100px">
        <div>
            <input type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target="#exampleModal-login" value="新增">
        </div>
        <hr>
        <table class="table table-striped">
            <tr class="text-center">
                <td>功能</td>
                <td>編號</td>
                <td>姓名</td>
                <td>Email</td>
            </tr>
            @foreach($show as $val)
                <tr class="text-center">
                    <td id="fun_{{$val->id}}">
                        <input type="button" class="btn btn-warning btn-xs" value="編輯" onclick="edit({{$val->id}})">
                        <input type="submit" class="btn btn-danger btn-xs" name="delete[{{$val->id}}]" value="刪除">
                    </td>
                    <td>{{$val->id}}</td>
                    <td id="name_{{$val->id}}">{{$val->name}}</td>
                    <td id="email_{{$val->id}}">{{$val->email}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- 新增 Modal -->
    <div class="modal" id="exampleModal-login" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width:500px;">
        <div class="modal-content">
          <div class="modal-header">
            <span class="modal-title" id="exampleModalLabel">新增資料</span>
          </div>
          <div class="modal-body" style="height:300px; text-align: center;">
            <br>
            <input type="text" name="name" style="margin-bottom:25px" placeholder="姓名">
            <br>
            <input type="text" name="email" placeholder="email">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
            <input type="submit" class="btn btn-primary" style="width:120px" name="insert" value="送出">
          </div>
        </div>
      </div>
    </div>
<script>
    function edit(no)
    {
        var name = $("#name_"+no).text();
        var email = $("#email_"+no).text();
        $("#fun_"+no).html(
            '<input type="submit" class="btn btn-success btn-xs" name="edit['+no+']" value="確定">'+
            '<input type="submit" class="btn btn-danger btn-xs" value="取消">');
        $("#name_"+no).html('<input type="text" style="width:120px" name="edit_name" value="'+name+'">');
        $("#email_"+no).html('<input type="text" style="width:120px" name="edit_email" value="'+email+'">');
    }
</script>        
</form>    
</body>
</html>
1