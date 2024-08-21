<x-app-layout>
    <x-slot name="header">
        <h3>Dados de Cliente</h3>
    </x-slot>
    <ol>
        <li>Nome: {{ $nome }}</li>
        <li>Documento: {{ $documento }}</li>
        <li>Status da Assinatura: {{ $situacao }}</li>
        <li>Bebida: {{ $bebida }}</li>
    </ol>
</x-app-layout>

<!--
        <li>Nome: {{ auth()->user()->name }}</li>
        <li>Documento: {{ auth()->user()->client->document }}</li>
        <li>Status da Assinatura: {{ auth()->user()->client->signatures->first()->status->name }}</li>
-->

