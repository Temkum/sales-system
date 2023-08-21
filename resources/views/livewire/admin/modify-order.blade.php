  <div>
    <div>
      <!-- Modal content -->
      <h2>Modify Order</h2>
      <!-- Form to update the order -->
      <form wire:submit.prevent="updateOrder">
        <!-- Order fields -->
        <label for="price">Price:</label>
        <input type="number" wire:model="price">

        <label for="advance">Advance:</label>
        <input type="number" wire:model="advance">

        <label for="due_date">Due Date:</label>
        <input type="date" wire:model="due_date">

        <label for="due_date">Due Date:</label>
        <input type="date" wire:model="balance">

        <label for="status">Status:</label>
        <input type="text" wire:model="status">

        <!-- Add any additional fields you need to modify -->

        <!-- Submit button -->
        <button type="submit">Update Order</button>
      </form>
    </div>
  </div>
