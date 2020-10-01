@extends('layouts.homeLayout')
@section('main')
  <div class="container">
    <h2 class="text-center mt-3">Внутрішні Данні Системи</h2>
    <table class="table table-light">
      <thead class="thead-dark">
        <th scope="col"></th>
        <th scope="col"></th>
      </thead>
      <tbody>
        <tr>
          <td>
            <a href="/diseases/show" class="btn btn-link">Хвороби</a>
          </td>
          <td>{{ $diseaseCount }}</td>
        </tr>
        <tr>
          <td>
            <a href="/symptoms/show" class="btn btn-link">Симптоми</a>
          </td>
          <td>{{ $symptomCount }}</td>
        </tr>
        <tr>
          <td>
            <a href="/medicaments/show" class="btn btn-link">Медикаменти</a>
          </td>
          <td>{{ $medicamentCount }}</td>
        </tr>
        <tr>
          <td>
            <a href="/treatments/show" class="btn btn-link">Схеми лікувань</a>
          </td>
          <td>{{ $treatmentCount }}</td>
        </tr>
        <tr>
          <td>
            <a href="/procedures/show" class="btn btn-link">Процедури</a>
          </td>
          <td>{{ $procedureCount }}</td>
        </tr>
        <tr>
          <td>
            <a href="/rooms/show" class="btn btn-link">Палати</a>
          </td>
          <td>{{ $roomCount }}</td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
