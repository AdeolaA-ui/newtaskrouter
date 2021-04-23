<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1\Room\Participant;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string sid
 * @property string participantSid
 * @property string roomSid
 * @property string name
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property boolean enabled
 * @property string kind
 * @property string url
 */
class PublishedTrackInstance extends InstanceResource {
    /**
     * Initialize the PublishedTrackInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $roomSid The room_sid
     * @param string $participantSid The participant_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Video\V1\Room\Participant\PublishedTrackInstance 
     */
    public function __construct(Version $version, array $payload, $roomSid, $participantSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'participantSid' => Values::array_get($payload, 'participant_sid'),
            'roomSid' => Values::array_get($payload, 'room_sid'),
            'name' => Values::array_get($payload, 'name'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'enabled' => Values::array_get($payload, 'enabled'),
            'kind' => Values::array_get($payload, 'kind'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'roomSid' => $roomSid,
            'participantSid' => $participantSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Video\V1\Room\Participant\PublishedTrackContext Context
     *                                                                      for
     *                                                                      this
     *                                                                      PublishedTrackInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new PublishedTrackContext(
                $this->version,
                $this->solution['roomSid'],
                $this->solution['participantSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a PublishedTrackInstance
     * 
     * @return PublishedTrackInstance Fetched PublishedTrackInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Video.V1.PublishedTrackInstance ' . implode(' ', $context) . ']';
    }
}