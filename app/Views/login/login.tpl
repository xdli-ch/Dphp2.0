{extends file="layout.html"}
{block name="main"}
<img class="index-banner" src="public/images/login-banner.png" alt="">
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body">
                        <form method="POST" action="/login">
                            <div class="form-group row">
                                <label for="account" class="col-sm-4 col-form-label text-md-right"><span class="red">*</span>账号</label>

                                <div class="col-md-6">
                                    <input id="account" type="text" class="form-control" name="account" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><span class="red">*</span>密码</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        &nbsp;登录&nbsp;
                                    </button>
                                    <span style="font-size: 14px;"> &nbsp;还没有账号?马上去向管理员申请</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .index-banner {
        height: 100%;
        width: 100%;
        -o-object-fit: cover;
        object-fit: cover;
        position: absolute;
        z-index: -1;
        top: 0;
    }
    .panel-body{
        margin-top: 30px;
    }
    .container{
        padding-top: 130px;
    }

</style>
<script>
    toastr.options.positionClass = 'toast-top-center';
    toastr.options.timeOut = '8000';

    {if isset($error)}
    var error_message = '{$error}';
    $(document).ready(function () {
        toastr.error(error_message);
    });
    {/if}

</script>
{/block}