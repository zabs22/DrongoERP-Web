<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    // Choices offered on the subscription form (value => label).
    public const ORGANIZATIONAL_STRUCTURES = [
        'sole' => 'Sole Proprietorship',
        'plc' => 'PLC',
        'share' => 'Share Company',
        'nonProfit' => 'Non-Profit',
        'governmental' => 'Governmental',
        'other' => 'Other',
    ];

    public const NATURES_OF_BUSINESS = [
        'manufacturing' => 'Manufacturing',
        'service' => 'Service',
        'import' => 'Import',
        'export' => 'Export',
        'wholesale' => 'Wholesale',
        'retail' => 'Retail',
        'other' => 'Other',
    ];

    public const INDUSTRY_SECTORS = [
        'trading' => 'Trading & Commerce',
        'healthcare' => 'Healthcare & Wellness',
        'hospitality' => 'Hospitality & Tourism',
        'education' => 'Education & Training',
        'construction' => 'Construction & Engineering',
        'realEstate' => 'Real Estate & Property',
        'agriculture' => 'Agriculture & Agribusiness',
        'finance' => 'Finance & Banking',
        'technology' => 'Technology & R&D',
        'publicSector' => 'Public Sector & Social Services',
        'energy' => 'Energy & Utilities',
        'transportation' => 'Transportation & Logistics',
        'food' => 'Food & Beverage',
        'entertainment' => 'Entertainment & Media',
        'other' => 'Other',
    ];

    public const EMPLOYEE_RANGES = [
        'justMe' => 'Just Me',
        '1To10' => '1 – 10',
        '11To50' => '11 – 50',
        '51To200' => '51 – 200',
        '201To500' => '201 – 500',
        '501To1000' => '501 – 1000',
        '1000Above' => '1000+',
    ];

    public const REQUEST_TYPES = [
        'newSystem' => 'New System',
        'changePackage' => 'Change in Package',
        'substitution' => 'A Substitution for an Existing System',
        'other' => 'Other',
    ];


    protected $fillable = [
        'user_id',
        'companyName',
        'phoneNum',
        'contactPhone',
        'email',
        'password',
        'firstName',
        'lastName',
        'title',
        'countryName',
        'requestType',
        'existingSystem',
        'otherRequestType',
         
        'businessType',
        'otherBusinessType',
        'businessGroup',
        'goodService',
        'otherBusinessGroup',
        'businessIndustry',
        'otherBusinessIndustry',
        'numOfEmployee',

        'street',
        'city',
        'state',
        'zipCode',
        'numOfCountry',
        'numOfBranches',
        'branchLocation',
        'selectedPackage',
        'totalAmount',
        'requestedPackage',
        'requestedAmount',
        'upgradeRequestedAt',
    ];
    protected $casts = [
        'businessType' => 'array',
        'businessGroup' => 'array',
        'businessIndustry' => 'array',
        'totalAmount' => 'array',
        'requestedAmount' => 'array',
        'upgradeRequestedAt' => 'datetime',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
