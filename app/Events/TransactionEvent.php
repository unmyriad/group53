<?php

namespace App\Events;

use App\Models\InventoryTransaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransactionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transactionId;
    public $createdAt;
    public $quantityChange;
    public $type;
    public $userName;
    public $productName;

    /**
     * Create a new event instance.
     *
     * @param InventoryTransaction $transaction
     * @return void
     */
    public function __construct(InventoryTransaction $transaction)
    {
        // Extract only serializable data
        $this->transactionId = $transaction->transaction_id;
        $this->createdAt = $transaction->created_at->format('M d, H:i');
        $this->quantityChange = $transaction->quantity_change;
        $this->type = $transaction->type;
        $this->userName = $transaction->user ? $transaction->user->name : 'System';
        $this->productName = $transaction->product->product_name ?? 'Deleted Product';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('stock-channel'),
        ];
    }

    /**
     * Data to broadcast with the event.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'transaction' => [
                'id' => $this->transactionId,
                'created_at' => $this->createdAt,
                'quantity_change' => $this->quantityChange,
                'type' => $this->type,
                'user' => $this->userName,
                'product_name' => $this->productName,
            ],
        ];
    }

    /**
     * The name of the event for broadcasting.
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'transaction_event';
    }
}
