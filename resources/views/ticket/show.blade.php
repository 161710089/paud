@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('tb_m_tickets.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('tb_m_tickets.fields.event')</th>
                            <td>{{ $tb_m_ticket->id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('tb_m_tickets.fields.title')</th>
                            <td>{{ $tb_m_ticket->id}}</td>
                        </tr>
                        <tr>
                            <th>@lang('tb_m_tickets.fields.amount')</th>
                            <td>{{ $tb_m_ticket->id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('tb_m_tickets.fields.available-from')</th>
                            <td>{{ $tb_m_ticket->id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('tb_m_tickets.fields.available-to')</th>
                            <td>{{ $tb_m_ticket->id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('tb_m_tickets.fields.price')</th>
                            <td>{{ $tb_m_ticket->id }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('ticket.index') }}" class="btn btn-default">@lang('qa_back_to_list')</a>
        </div>
    </div>
@stop