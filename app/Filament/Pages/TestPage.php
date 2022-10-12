<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Page;
use Illuminate\Support\HtmlString;

class TestPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.test-page';

    public function mount()
    {
        $this->form->fill();
    }

    public $state;

    protected function getFormStatePath(): ?string
    {
        return 'state';
    }

    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Wizard\Step::make('Step #1')->schema([
                    TextInput::make('input_one')
                        ->required()
                ]),
                Wizard\Step::make('Step #2')->schema([
                    TextInput::make('input_two')
                        ->required()
                ]),
                Wizard\Step::make('Step #3')->schema([
                    TextInput::make('input_three')
                        ->required()
                ])
            ])->submitAction(new HtmlString('<button type="submit">Submit</submit>'))
        ];
    }

    public function submit()
    {
        $this->form->validate();

        dd('Submitted');
    }
}
