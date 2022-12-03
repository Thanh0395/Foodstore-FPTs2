@extends('users.userlayout.masterProduct')
@section('content')
    <div class="container">
        <div class="row">
            <div style="" class="detail col-lg-10 border p-3 main-section bg-white">
                <div class="row m-1">
                    <div class="col-lg-12">
                        <div class="border p-3 m-0">
                            <div class="row" style="">
                                <div class="col-md-2 col-sm-2 col-xs-12"><img class="" style="margin: 5%; width: 200px"
                                        src="{{ asset($user->avatar) }}" alt=""></div>
                                <div class="col-lg-8">
                                    {{-- De tai file qua form them dong vào the form: enctype="multipart/form-data" --}}
                                    {{-- {{ route('user.updateprofile', $user->U_id) }} --}}
                                    <form action="{{ route('user.updateprofile', $user->U_id) }}" method="post"
                                        class="form-horizontal form-label-left"
                                        enctype="multipart/form-data" onsubmit="return validate();">
                                        @csrf
                                        <h3 align="center">Update user form</h3>
                                        <br>
                                        <div class="row">
                                            <table>
                                                {{-- Image --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="avatar">
                                                            Change avatar:</label>
                                                    </th>
                                                    <td>
                                                        <input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="avatar" type="file">
                                                        <input type="text" value="{{ $user->avatar }}" name="avtName"
                                                            hidden>
                                                    </td>
                                                </tr>
                                                {{-- Name --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="name">
                                                            Name:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="name" value="{{ $user->name }}" required="required"
                                                            type="text"></td>
                                                </tr>
                                                {{-- Email --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="email">
                                                            Email:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="email" value="{{ $user->email }}" required="required"
                                                            type="email" id="email"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p id="errorMsgEmail"
                                                            style="color: red; font-style: italic; margin: 0px"></p>
                                                    </td>
                                                </tr>
                                                {{-- Phone --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="phone">
                                                            Phone:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="phone" value="{{ $user->phone }}" required="required"
                                                            type="number" id="phone"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p id="errorMsgPhone"
                                                            style="color: red; font-style: italic; margin: 0px"></p>
                                                    </td>
                                                </tr>
                                                {{-- Address --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="address">
                                                            Address:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="address" value="{{ $user->address }}" required="required"
                                                            type="text"></td>
                                                </tr>
                                                {{-- Old password --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="password">
                                                            Password:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="password" id="password"
                                                            placeholder="Change your current password"
                                                             type="password"></td>
                                                </tr>
                                                {{-- Set new password --}}
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="newpassword">
                                                            Set new password:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="newpassword" id="newpassword"
                                                            placeholder="Set new password here or not"
                                                             type="password"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p id="errorMsgPw"
                                                            style="color: red; font-style: italic; margin: 0px"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: right; padding: 12px;"><label
                                                            class="control-label" for="confirm_password">
                                                            Confirm password:</label>
                                                    </th>
                                                    <td><input class="form-control col-md-8 col-sm-8 col-xs-8"
                                                            name="confirm_password" placeholder="Confirm your password"
                                                            id="confirm_password" type="password"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <p id="errorMsgCPw"
                                                            style="color: red; font-style: italic; margin: 0px"></p>
                                                    </td>
                                                </tr>
                                            </table>
                                            {{-- Nút cancel và submit --}}
                                            <div class="form-group" style="text-align: center"><br>
                                                <input type="submit" class="btn btn-primary" value="Update" id="submit">
                                                <a href="{{ route('user.profile') }}"
                                                    class="btn btn-danger offset-1">Cancel</a>
                                            </div>

                                            <script>
                                                function validate() {
                                                    //Kiem tra mail
                                                    var sMail = document.getElementById("email").value;
                                                    var reMail = /^\w+[@]\w+[.]\w+([.]\w+)?$/;
                                                    if (!reMail.test(sMail)) {
                                                        document.getElementById("errorMsgEmail").innerHTML = "Enter the correct email format, ex: abc@gmail.com";
                                                        document.getElementById("email").focus();
                                                        return false;
                                                    }
                                                    //Kiem tra phone
                                                    var sPhone = document.getElementById("phone").value;
                                                    var rePhone = /^\d{10,12}$/;
                                                    if (!rePhone.test(sPhone)) {
                                                        document.getElementById("errorMsgPhone").innerHTML = "Enter the correct phone 10-12 digits";
                                                        document.getElementById("phone").focus();
                                                        return false;
                                                    }
                                                    //Kiem tra pass
                                                    var sPass = document.getElementById("newpassword").value;
                                                    if (sPass.length>0 && sPass.length <6) {
                                                        document.getElementById("errorMsgPw").innerHTML = "Enter the new password length >= 6";
                                                        document.getElementById("newpassword").focus();
                                                        return false;
                                                    }
                                                    var sCPass = document.getElementById("confirm_password").value;
                                                    if (sPass != sCPass) {
                                                        document.getElementById("errorMsgCPw").innerHTML = "Password is not match";
                                                        document.getElementById("confirm_password").focus();
                                                        return false;
                                                    }
                                                    else return true;
                                                }
                                            </script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
