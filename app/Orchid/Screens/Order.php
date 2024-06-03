<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;


class Order extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Orders $order): array
    {
        return [
            'order' => $order
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Orders';
    }
    public function description(): ?string
    {
        return "Если я успел доделать - вы должны видеть заказы...";
    }
    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [Button::make('Create order')
        ->icon('pencil')
        ->method('createOrUpdate'),

    Button::make('Update')
        ->icon('note')
        ->method('createOrUpdate'),

    Button::make('Remove')
        ->icon('trash')
        ->method('remove'),
    ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('order.title')
                    ->title('Title')
                    ->placeholder('Название товара')
                    ->help('Название товара'),

                TextArea::make('order.quantity')
                    ->title('quantity')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Количество'),

                TextArea::make('order.price')
                    ->title('price')
                    ->placeholder('Цена'),

                Quill::make('order.status')
                    ->title('status'),

        ])];
    }
    public function createOrUpdate(Request $request)
    {
        $this->orders->fill($request->get('order'))->save();

        Alert::info('You have successfully created a post.');

        return redirect()->route('platform.order');
    }
}
