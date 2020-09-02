<div>
    <label for="file" style=" padding: .5rem; border-radius: 5px;" class="{{$buttonContainerClass}}">
        {{$label}}
    </label>

    <span id="chosenFile" class="{{$fileContainerClass}}">
    </span>

    <input type="file" name="{{$name}}" id="file" style="display: none;">
</div>

<style>
    label:hover {
        color: #718096;
    }
</style>

<script>
    document.getElementById('file').onchange = function () {
        document.getElementById('chosenFile').innerHTML = this.files[0].name;
    };
</script>
