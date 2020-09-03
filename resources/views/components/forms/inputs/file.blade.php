<div>
    <label for="file" class="default {{$buttonContainerClass}}">
        {{$label}}
    </label>

    <span id="chosenFile" class="{{$fileContainerClass}}">
    </span>

    <input type="file" name="{{$name}}" id="file" style="display: none;">
</div>

<style>
    .default {
        padding: .5rem;
        border-radius: 5px;
    }

    .default:hover {
        color: #718096;
    }
</style>

<script>
    document.getElementById('file').onchange = function () {
        document.getElementById('chosenFile').innerHTML = this.files[0].name;
    };
</script>
