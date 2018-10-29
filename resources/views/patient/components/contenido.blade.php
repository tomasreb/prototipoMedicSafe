
@extends('patient.home')

@section('contenido')


<template v-if="menu==0">
    <profile>  </profile>

</template>

<template v-if="menu==1">

        <diagnosticos></diagnosticos>

</template>

<template v-if="menu==2">

        <h1>descargar estudios</h1>

</template>

<template v-if="menu==3">

        <vermisestudios></vermisestudios>

</template>

<template v-if="menu==4">

        <medicos></medicos>

</template>

<template v-if="menu==5">

        <h1>MIS TURNOS</h1>

</template>

<template v-if="menu==6">

        <turnos></turnos>

</template>

<template v-if="menu==7">

        <historia></historia>

</template>

<template v-if="menu==8">

        <h1>jdas</h1>

</template>

<template v-if="menu==9">

        <h1>AYUDA</h1>

</template>

<template v-if="menu==10">

        <acercade> </acercade>

</template>


@endsection
