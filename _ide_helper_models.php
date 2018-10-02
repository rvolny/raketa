<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Wallet
 *
 * @property int $id
 * @property int $users_id
 * @property float $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wallet whereUsersId($value)
 * @mixin \Eloquent
 */
	class Wallet extends \Eloquent {}
}

namespace App{
/**
 * App\UserRoute
 *
 * @property int $id
 * @property int $couriers_id
 * @property string $destination
 * @property string $recurrence
 * @property int $list_transportation_types_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereCouriersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereListTransportationTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereRecurrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRoute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class UserRoute extends \Eloquent {}
}

namespace App{
/**
 * App\ListDocumentType
 *
 * @property int $id
 * @property string $document_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListDocumentType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ListDocumentType extends \Eloquent {}
}

namespace App{
/**
 * App\WalletTransaction
 *
 * @property int $id
 * @property int $wallets_id
 * @property float $balance_change
 * @property int $users_id Transaction created by
 * @property string $transaction_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereBalanceChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WalletTransaction whereWalletsId($value)
 * @mixin \Eloquent
 */
	class WalletTransaction extends \Eloquent {}
}

namespace App{
/**
 * App\Sender
 *
 * @property int $id
 * @property int $users_id
 * @property int $documents_id
 * @property string $agreement_checked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereAgreementCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereDocumentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sender whereUsersId($value)
 * @mixin \Eloquent
 */
	class Sender extends \Eloquent {}
}

namespace App{
/**
 * App\TransportationOffer
 *
 * @property int $id
 * @property int $senders_id
 * @property int $couriers_id
 * @property int $packages_id
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereCouriersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer wherePackagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereSendersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TransportationOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TransportationOffer extends \Eloquent {}
}

namespace App{
/**
 * App\Message
 *
 * @property int $id
 * @property int|null $users_id_from Null means the message is from system itself
 * @property int $users_id_to
 * @property string $message
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUsersIdFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUsersIdTo($value)
 * @mixin \Eloquent
 */
	class Message extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $picture_path
 * @property string $language ISO 639-1
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\ListTransportationType
 *
 * @property int $id
 * @property string $transportation_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereTransportationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListTransportationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ListTransportationType extends \Eloquent {}
}

namespace App{
/**
 * App\ListInsuranceRange
 *
 * @property int $id
 * @property string $insurance_range
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereInsuranceRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListInsuranceRange whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ListInsuranceRange extends \Eloquent {}
}

namespace App{
/**
 * App\Document
 *
 * @property int $id
 * @property int $list_document_types_id
 * @property string $scan_front_path
 * @property string|null $scan_back_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereListDocumentTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanBackPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanFrontPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Document extends \Eloquent {}
}

namespace App{
/**
 * App\UserRating
 *
 * @property int $id
 * @property int $users_id
 * @property int $users_id_rating_from
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRating whereUsersIdRatingFrom($value)
 * @mixin \Eloquent
 */
	class UserRating extends \Eloquent {}
}

namespace App{
/**
 * App\Courier
 *
 * @property int $id
 * @property int $users_id
 * @property int $documents_id
 * @property string $agreement_checked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereAgreementCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereDocumentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Courier whereUsersId($value)
 * @mixin \Eloquent
 */
	class Courier extends \Eloquent {}
}

namespace App{
/**
 * App\Package
 *
 * @property int $id
 * @property int $senders_id
 * @property int $couriers_id
 * @property string $contents
 * @property string|null $photo_path
 * @property int $list_package_types_id
 * @property string $pickup_location
 * @property string $pickup_date
 * @property string|null $pickup_time
 * @property string|null $pickup_note
 * @property string $delivery_location
 * @property string $delivery_date
 * @property string|null $delivery_time
 * @property string|null $delivery_note
 * @property float $price
 * @property string $currency
 * @property float|null $price_max_increase
 * @property int|null $list_insurance_ranges_id
 * @property string|null $alternative_contact
 * @property string|null $password
 * @property string|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereAlternativeContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCouriersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereListInsuranceRangesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereListPackageTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePickupTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePriceMaxIncrease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereSendersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Package extends \Eloquent {}
}

namespace App{
/**
 * App\ListPackageType
 *
 * @property int $id
 * @property string $package_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType wherePackageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ListPackageType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ListPackageType extends \Eloquent {}
}

