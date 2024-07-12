<?php

namespace Teodoriu\Whatsapp\Messages;

class FlowMessage extends WhatsappMessage
{
    public const TYPE = 'template';

    public static function create(
        string $name = '',
        string $language = '',
    ): static {
        return new static($name, $language);
    }

    public function __construct(
        public string $name,
        public string $language,
    ) {
        //
    }

    public function name(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function language(string $language): static
    {
        $this->language = $language;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'template' => [
                'name' => $this->name,
                'language' => ['code' => $this->language],
                'components' => [
                    [
                        'type' => 'button',
                        'sub_type' => 'flow',
                        'index' => 0,
//                        'parameters' => [
//                            [
//                                'type' => 'action',
//                                'action' => [
//                                    'flow_token' => 'FLOW_TOKEN',
//                                    'flow_action_data' => [
//
//                                    ]
//                                ]
//                            ]
//                        ]
                    ]
                ]
            ],
        ];
    }
}
