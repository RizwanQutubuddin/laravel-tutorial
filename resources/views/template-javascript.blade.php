@php
    $user="Rizwan";
    $fruits=["Apple","Banana","Cherry","Grapes"];
    $animals=["Lion","Bear","Cat","Dog"];
@endphp

<h1>template-javascript</h1>


<script>
    var user=@json($user); //method 1
    var fruits=@json($fruits); //method 1
    var animals={{Js::from($animals)}}; //method 2
    console.log(user);
    console.log(fruits);
    console.log(animals);
</script>