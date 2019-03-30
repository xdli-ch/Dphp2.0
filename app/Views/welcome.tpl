{extends file="page_middle.html"}
{block name="content"}
    <div>
        <p>Dphp，欢迎您！</p>
        <p>你好，{if isset($user_info)}{$user_info->name}{else}未知身份{/if}。</p>
    </div>
    <script>
        $(function() {
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.timeOut = '1400';

            {if isset($success)}
            var message = '{$success}';
            toastr.options.timeOut = '4000';
            toastr.success(message);
            {/if}

            {if isset($error)}
            var error_message = '{$error}';
            toastr.options.timeOut = '4000';
            toastr.error(error_message);
            {/if}
        });

    </script>

{/block}