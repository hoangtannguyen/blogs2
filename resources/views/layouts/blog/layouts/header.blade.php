
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<style>
    label.error {color:red;}
  
    input.error {border:1px dotted red;}


    .error {
  color: red;
  margin-left: 5px;
}

</style>