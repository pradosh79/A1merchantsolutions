<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreScreenRequest;
use App\Http\Requests\Admin\UpdateScreenRequest;
use App\Models\Screen;
use App\Services\ScreenService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScreenController extends Controller
{
    public function __construct(protected ScreenService $screens)
    {
    }

    public function index(): View
    {
        $screens = $this->screens->paginate(15);

        return view('admin.screens.index', compact('screens'));
    }

    public function create(): View
    {
        $this->authorize('create', Screen::class);

        return view('admin.screens.create');
    }

    public function store(StoreScreenRequest $request): RedirectResponse
    {
        $screen = $this->screens->create($request->validated());

        return redirect()->route('admin.screens.show', $screen)
            ->with('status', 'Screen created successfully.');
    }

    public function show(Screen $screen): View
    {
        $this->authorize('view', $screen);

        $screen->load('offers');

        return view('admin.screens.show', compact('screen'));
    }

    public function edit(Screen $screen): View
    {
        $this->authorize('update', $screen);

        return view('admin.screens.edit', compact('screen'));
    }

    public function update(UpdateScreenRequest $request, Screen $screen): RedirectResponse
    {
        $this->screens->update($screen, $request->validated());

        return redirect()->route('admin.screens.show', $screen)
            ->with('status', 'Screen updated successfully.');
    }

    public function destroy(Screen $screen): RedirectResponse
    {
        $this->authorize('delete', $screen);

        $this->screens->delete($screen);

        return redirect()->route('admin.screens.index')->with('status', 'Screen deleted.');
    }
}
