
@extends('medic.home')

@section('contenido')


<template v-if="menu==0">
    <perfilmedico></perfilmedico>

</template>

<template v-if="menu==1">
<misdiagnosticos></misdiagnosticos>


</template>

<template v-if="menu==3">
<h1>1023987192739817381927389217389172893712897318278931279871239871298371973891732</h1>


</template>



<template v-if="menu==4">

   <mispacientes></mispacientes>


</template>

<template v-if="menu==5">
<agregarpaciente></agregarpaciente>

</template>

<template v-if="menu==6">



</template>

<template v-if="menu==7">



</template>

<template v-if="menu==8">



</template>

<template v-if="menu==9">



</template>

<template v-if="menu==10">



</template>


@endsection
