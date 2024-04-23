// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'activities.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

Activities _$ActivitiesFromJson(Map<String, dynamic> json) => Activities(
      role: Activities._roleFromJson(json['role'] as Map<String, dynamic>?),
      name: json['name'] as String? ?? '',
      picture: Activities._nullToEmptyString(json['picture']),
      bio: Activities._bioFromJson(json['bio'] as Map<String, dynamic>?),
      institution: Activities._nullToEmptyString(json['institution']),
      id: json['id'] as int,
      changed: json['changed'] as int? ?? 0,
      start: Activities._nullToEmptyString(json['start']),
      end: Activities._nullToEmptyString(json['end']),
      title: Activities._titleFromJson(json['title'] as Map<String, dynamic>?),
      description: Activities._descriptionFromJson(
          json['description'] as Map<String, dynamic>?),
      category: Category.fromJson(json['category'] as Map<String, dynamic>),
      locations: (json['locations'] as List<dynamic>)
          .map((e) => Location.fromJson(e as Map<String, dynamic>))
          .toList(),
      type: Type.fromJson(json['type'] as Map<String, dynamic>),
      papers: json['papers'] as List<dynamic>,
      people: (json['people'] as List<dynamic>)
          .map((e) => Person.fromJson(e as Map<String, dynamic>))
          .toList(),
      status: json['status'] as int,
      weight: json['weight'] as int,
      addons: Activities._nullToEmptyString(json['addons']),
      parent: json['parent'] as int? ?? 0,
      event: Activities._nullToEmptyString(json['event']),
    );

Map<String, dynamic> _$ActivitiesToJson(Activities instance) =>
    <String, dynamic>{
      'id': instance.id,
      'changed': instance.changed,
      'name': instance.name,
      'start': instance.start,
      'end': instance.end,
      'institution': instance.institution,
      'bio': instance.bio,
      'title': instance.title,
      'description': instance.description,
      'picture': instance.picture,
      'category': instance.category,
      'locations': instance.locations,
      'type': instance.type,
      'papers': instance.papers,
      'people': instance.people,
      'status': instance.status,
      'weight': instance.weight,
      'role': instance.role,
      'addons': instance.addons,
      'parent': instance.parent,
      'event': instance.event,
    };
