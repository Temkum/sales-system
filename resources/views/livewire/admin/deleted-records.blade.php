<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th>{{ __('Sale code') }}</th>
        <th>{{ __('Client') }}</th>
        <th>{{ __('Address') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Qty') }}</th>
        <th>{{ __('Advance') }}</th>
        <th>{{ __('Due date') }}</th>
        <th>{{ __('Balance') }}</th>
        <th>{{ __('Description') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Date added') }}</th>
        <th>{{ __('Deleted At') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($deleted_records as $record)
        <tr>
          <td>{{ $record->sale_code }}</td>
          <td>{{ $record->name }}</td>
          <td>{{ $record->address }}</td>
          <td>{{ $record->price }}</td>
          <td>{{ $record->quantity }}</td>
          <td>{{ $record->advance }}</td>
          <td>{{ $record->due_date }}</td>
          <td>{{ $record->balance }}</td>
          <td>{{ $record->description }}</td>
          <td>{{ $record->status }}</td>
          <td>{{ $record->created_at }}</td>
          <td>{{ $record->deleted_at }}</td>
          <td class="d-flex">
            <button class="btn btn-info btn-sm m-1"
              wire:click="restore({{ $record->id }})">{{ __('Restore') }}</button>
            <button class="btn btn-danger btn-sm"
              wire:click="hardDelete({{ $record->id }})">{{ __('Delete') }}</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
