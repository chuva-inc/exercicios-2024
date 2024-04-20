part of 'data_model.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

DataModel _$DataModelFromJson(Map<String, dynamic> json) => DataModel(
      count: json['count'] as int,
      links: Links.fromJson(json['links'] as Map<String, dynamic>),
      data: (json['data'] as List<dynamic>)
          .map((e) => Data.fromJson(e as Map<String, dynamic>))
          .toList(),
    );

Map<String, dynamic> _$DataModelToJson(DataModel instance) => <String, dynamic>{
      'count': instance.count,
      'links': instance.links,
      'data': instance.data,
    };

Links _$LinksFromJson(Map<String, dynamic> json) => Links(
      self: json['self'] as String,
      next: json['next'],
    );

Map<String, dynamic> _$LinksToJson(Links instance) => <String, dynamic>{
      'self': instance.self,
      'next': instance.next,
    };

Data _$DataFromJson(Map<String, dynamic> json) => Data(
      id: json['id'] as int,
      changed: json['changed'] as int,
      start: json['start'] as String,
      end: json['end'] as String,
      title: TitleClass.fromJson(json['title'] as Map<String, dynamic>),
      description:
          Description.fromJson(json['description'] as Map<String, dynamic>),
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
      addons: json['addons'],
      parent: json['parent'],
      event: json['event'] as String,
    );

Map<String, dynamic> _$DataToJson(Data instance) => <String, dynamic>{
      'id': instance.id,
      'changed': instance.changed,
      'start': instance.start,
      'end': instance.end,
      'title': instance.title,
      'description': instance.description,
      'category': instance.category,
      'locations': instance.locations,
      'type': instance.type,
      'papers': instance.papers,
      'people': instance.people,
      'status': instance.status,
      'weight': instance.weight,
      'addons': instance.addons,
      'parent': instance.parent,
      'event': instance.event,
    };

TitleClass _$TitleClassFromJson(Map<String, dynamic> json) => TitleClass(
      ptBr: json['pt-br'] as String?,
    );

Map<String, dynamic> _$TitleClassToJson(TitleClass instance) =>
    <String, dynamic>{
      'pt-br': instance.ptBr,
    };

Description _$DescriptionFromJson(Map<String, dynamic> json) => Description(
      ptBr: json['pt-br'] as String?,
    );

Map<String, dynamic> _$DescriptionToJson(Description instance) =>
    <String, dynamic>{
      'pt-br': instance.ptBr,
    };

Category _$CategoryFromJson(Map<String, dynamic> json) => Category(
      id: json['id'] as int,
      title: TitleClass.fromJson(json['title'] as Map<String, dynamic>),
      color: json['color'] as String?,
      backgroundColor: json['background-color'] as String?,
    );

Map<String, dynamic> _$CategoryToJson(Category instance) => <String, dynamic>{
      'id': instance.id,
      'title': instance.title,
      'color': instance.color,
      'background-color': instance.backgroundColor,
    };

Location _$LocationFromJson(Map<String, dynamic> json) => Location(
      id: json['id'] as int,
      title: TitleClass.fromJson(json['title'] as Map<String, dynamic>),
      parent: json['parent'] as int,
      map: json['map'],
    );

Map<String, dynamic> _$LocationToJson(Location instance) => <String, dynamic>{
      'id': instance.id,
      'title': instance.title,
      'parent': instance.parent,
      'map': instance.map,
    };

Type _$TypeFromJson(Map<String, dynamic> json) => Type(
      id: json['id'] as int,
      title: TitleClass.fromJson(json['title'] as Map<String, dynamic>),
    );

Map<String, dynamic> _$TypeToJson(Type instance) => <String, dynamic>{
      'id': instance.id,
      'title': instance.title,
    };

Person _$PersonFromJson(Map<String, dynamic> json) => Person(
      id: json['id'] as int,
      title: json['title'] as String?,
      name: json['name'] as String,
      institution: json['institution'] as String?,
      bio: Bio.fromJson(json['bio'] as Map<String, dynamic>),
      picture: json['picture'] as String?,
      weight: json['weight'] as int,
      role: Role.fromJson(json['role'] as Map<String, dynamic>),
      hash: json['hash'] as String,
    );

Map<String, dynamic> _$PersonToJson(Person instance) => <String, dynamic>{
      'id': instance.id,
      'title': instance.title,
      'name': instance.name,
      'institution': instance.institution,
      'bio': instance.bio,
      'picture': instance.picture,
      'weight': instance.weight,
      'role': instance.role,
      'hash': instance.hash,
    };

Bio _$BioFromJson(Map<String, dynamic> json) => Bio(
      ptBr: json['pt-br'] as String?,
    );

Map<String, dynamic> _$BioToJson(Bio instance) => <String, dynamic>{
      'pt-br': instance.ptBr,
    };

Role _$RoleFromJson(Map<String, dynamic> json) => Role(
      id: json['id'] as int,
      label: Label.fromJson(json['label'] as Map<String, dynamic>),
    );

Map<String, dynamic> _$RoleToJson(Role instance) => <String, dynamic>{
      'id': instance.id,
      'label': instance.label,
    };

Label _$LabelFromJson(Map<String, dynamic> json) => Label(
      ptBr: json['pt-br'] as String?,
    );

Map<String, dynamic> _$LabelToJson(Label instance) => <String, dynamic>{
      'pt-br': instance.ptBr,
    };
