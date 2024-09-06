<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToAuth(): JsonResponse
    {
        return response()->json([
            'url' => Socialite::driver('google')
                ->stateless()
                ->redirect()
                ->getTargetUrl(),
        ]);
    }

    public function handleAuthCallback(): JsonResponse
    {
        $socialiteUser = null;

        try {
            /** @var SocialiteUser $socialiteUser */
            $socialiteUser = Socialite::driver('google')->stateless()->user();

            \Log::info(json_encode($socialiteUser));

        } catch (ClientException $e) {
            
            \Log::info($e);

            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }

        /** @var User $user */
        $user = User::query()
            ->firstOrCreate(
                [
                    'email' => $socialiteUser->getEmail(),
                ],
                [
                    'email_verified_at' => now(),
                    'name' => $socialiteUser->getName(),
                    'google_id' => $socialiteUser->getId(),
                    'avatar' => $socialiteUser->getAvatar(),
                ]
            );

        return response()->json([
            'user' => $user,
            'access_token' => $user->createToken('google-token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
}