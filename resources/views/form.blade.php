@extends('layouts.app')

@section('content')

    <form method="post" action="{{route('store.lang')}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="languages">Languages</label>
                <select name="languages[]" id="languages" class="form-control" multiple>
                    <option value="0">Choose Language...</option>
                    <option value="1">English</option>
                    <option value="2">Arabic</option>
                    <option value="3">France</option>
                </select>
            </div>
        </div>
        <!--added one common class i.e : selects-->
        <div id="arabicShow" class="form-row selects">
            <div id="" class="form-group col-md-6">
                <label for="arabic">Arabic level</label>
                <select name="arabic" id="arabic" class="form-control">
                    <option value='null' selected>Choose Your level...</option>
                    <option value='good'>a</option>
                    <option value='bad'>b</option>
                </select>
            </div>
        </div>

        <div id="englishShow" class="form-row selects">
            <div class="form-group col-md-6">
                <label for="english">English level</label>
                <select id="english" name="english" class="form-control">
                    <option value='null'>Choose Your level...</option>
                    <option value='good'>a</option>
                    <option value='bad'>b</option>
                </select>
            </div>
        </div>
        <div id="franceShow" class="form-row selects">
            <div class="form-group col-md-6">
                <label for="france">France level</label>
                <select id="france" name="france" class="form-control">
                    <option value='null'>Choose Your level...</option>
                    <option value='good'>a</option>
                    <option value='bad'>b</option>
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#languages option:first-child").attr("disabled", "disabled");
            $("#arabic option:first-child").attr("disabled", "disabled");
            $("#english option:first-child").attr("disabled", "disabled");
            $("#france option:first-child").attr("disabled", "disabled");
            $('.selects').hide(); //hide all
            $('#languages').change(function() {
                $('.selects select:not(:visible) option:first').prop("selected",true); //reset
                $('.selects').hide(); //hide all
                //loop through all selected options..
                $(this).find("option:selected").each(function() {
                    var text = $(this).text()
                    if (text === "Arabic") {
                        $('#arabicShow').show();
                    } else if (text === "English") {
                        $('#englishShow').show();
                    } else if (text === "France") {
                        $('#franceShow').show();
                    }
                })

            });
        });
    </script>

@stop
