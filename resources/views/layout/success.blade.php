<?php
/**
 * Created by PhpStorm.
 * User: KILENGA
 * Date: 11/16/2018
 * Time: 12:36 PM
 */
?>


@if (session()->has('success'))
    <div class="alert alert-dismissable alert-success msg" style="margin-top: 0vh !important; margin-bottom: 0">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif
